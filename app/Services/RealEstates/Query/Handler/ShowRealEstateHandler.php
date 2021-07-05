<?php

namespace App\Services\RealEstates\Query\Handler;


use App\Services\CQRS\Query;
use App\Services\CQRS\QueryHandler;
use App\Services\Documents\Models\Document;
use App\Services\Documents\Models\DocumentCategory;
use App\Services\Documents\Repositories\DocumentRepository;
use App\Services\RealEstates\Query\ShowRealEstateQuery;

class ShowRealEstateHandler implements QueryHandler
{
    /**
     * ShowRealEstateHandler constructor.
     *
     * @param DocumentRepository $documentRepository
     */
    public function __construct(
        private DocumentRepository $documentRepository
    )
    {
    }

    /**
     * @param ShowRealEstateQuery $query
     * @return mixed|void
     */
    public function execute(Query $query)
    {
        $documents = $this->documentRepository->getPublishedDocumentsWithoutRealEstates();
        $documents = $documents->merge($query
            ->getRealEstate()
            ->documents
            ->filter(fn(Document $document) => $document->published)
            ->sortBy('id'));

        return [
            'realEstate' => $query->getRealEstate(),
            'documentCategories' => DocumentCategory::all()->map(function($documentCategory) use ($documents) {
                $documentCategory->documents = $documents->filter(function($document) use ($documentCategory) {
                   return  $document->category->id === $documentCategory->id;
                });
                return $documentCategory;
            })->filter(fn($documentCategory) => !$documentCategory->documents->isEmpty()),

        ];
    }
}
