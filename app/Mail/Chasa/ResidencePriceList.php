<?php

namespace App\Mail\Chasa;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Livewire\Component;

class ResidencePriceList extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        protected Component $residenceForm
    )
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('templates.chasa.emails.residence-price-list')
            ->with($this->residenceForm->getPublicPropertiesDefinedBySubClass())
            ->attach(storage_path('app/price-list/pricelist.pdf'));
    }
}
