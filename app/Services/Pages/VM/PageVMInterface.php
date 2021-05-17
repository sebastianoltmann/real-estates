<?php


namespace App\Services\Pages\VM;


use Illuminate\Support\Collection;

interface PageVMInterface
{
    public function title(): string;

    public function seo(): Collection|array;

    public function breadcrumbs(): Collection|array;
}
