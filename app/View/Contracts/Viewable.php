<?php


namespace App\View\Contracts;


interface Viewable
{

    /**
     * @return string|null
     */
    public function view(): string|null;
}
