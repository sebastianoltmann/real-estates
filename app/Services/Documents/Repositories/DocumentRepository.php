<?php


namespace App\Services\Documents\Repositories;

use App\Common\Repositories\Eloquent\EloquentRepository;
use App\Models\User;
use App\Services\Documents\Events\DocumentHasBeenDownloaded;
use App\Services\Documents\Models\Document;
use Carbon\Carbon;

class DocumentRepository extends EloquentRepository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return Document::class;
    }

    /**
     * @param Document $document
     * @param User     $user
     * @return bool
     */
    public function userDownloadedDocument(Document $document, User $user): bool
    {
        return $this->lastDownloadedTimeByUser($user, $document) instanceof Carbon;
    }

    /**
     * @param Document $document
     * @param User     $user
     * @return Carbon|null
     */
    public function lastDownloadedTimeByUser(User $user, Document $document = null): ?Carbon
    {
        if(empty($document)) {
            $document = $this->lastDownloadedDocumentByUser($user);
        }

        if($lastDownloadAt = $this->getLastDownloadedDocumentTimeFromEventByUser($document, $user)) {
            return $lastDownloadAt;
        }

        return null;
    }

    /**
     * @param User $user
     * @return Document|null
     */
    public function lastDownloadedDocumentByUser(User $user): ?Document
    {
        $storeEvent = config('event-sourcing.stored_event_model');

        $event = $storeEvent::whereEventClass(DocumentHasBeenDownloaded::class)
            ->where('meta_data->download_by', $user->id)
            ->orderBy($storeEvent::CREATED_AT, 'desc')
            ->first();

        if(!$event) return null;

        return $this->find($event->event_properties['document']['id']);
    }

    /**
     * @param Document $document
     * @param User     $user
     * @return null
     */
    private function getLastDownloadedDocumentTimeFromEventByUser(Document $document, User $user): ?Carbon
    {
        $storeEvent = config('event-sourcing.stored_event_model');
        $event = $storeEvent::whereEventClass(DocumentHasBeenDownloaded::class)
            ->where('meta_data->download_by', $user->id)
            ->where('event_properties->document->id', $document->id)
            ->orderBy($storeEvent::CREATED_AT, 'desc')
            ->first();

        return $event
            ? Carbon::createFromTimeString($event->{$storeEvent::CREATED_AT})
            : null;
    }
}
