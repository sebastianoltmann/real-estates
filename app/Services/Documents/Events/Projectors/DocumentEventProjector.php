<?php

namespace App\Services\Documents\Events\Projectors;

use App\Models\User;
use App\Services\Documents\Events\DocumentHasBeenDownloaded;
use App\Services\Documents\Events\DocumentHasBeenUpdated;
use App\Services\Documents\Models\Document;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use Spatie\EventSourcing\StoredEvents\StoredEvent;
use Spatie\EventSourcing\StoredEvents\Repositories\StoredEventRepository;

class DocumentEventProjector extends Projector
{

    /*
     * Here you can specify which event should trigger which method.
     */
    public array $handlesEvents = [
        DocumentHasBeenUpdated::class => 'onDocumentHasBeenUpdated',
        DocumentHasBeenDownloaded::class => 'onDocumentHasBeenDownloaded'
    ];

    /**
     * @param StoredEvent           $storedEvent
     * @param StoredEventRepository $repository
     */
    public function onDocumentHasBeenUpdated(StoredEvent $storedEvent, StoredEventRepository $repository)
    {
        $storedEvent->meta_data['update_by'] = $storedEvent->event->document->updator->id;

        $repository->update($storedEvent);
    }

    /**
     * @param StoredEvent           $storedEvent
     * @param StoredEventRepository $repository
     */
    public function onDocumentHasBeenDownloaded(StoredEvent $storedEvent, StoredEventRepository $repository)
    {
        /**
         * @var User $loggedUser
         */
        $loggedUser = auth()->user();

        $storedEvent->meta_data['download_by'] = $loggedUser->id;

        $repository->update($storedEvent);
    }
}
