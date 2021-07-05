<?php

namespace App\Services\Documents\Events;

use App\Services\Documents\Models\Document;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

/**
 * Class DocumentEvent
 *
 * @param Document $document
 * @package App\Services\Documents\Events
 */
abstract class DocumentEvent extends ShouldBeStored
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * DocumentEvent constructor.
     *
     * @param $document
     */
    public function __construct(
        public $document
    )
    {
    }
}
