<?php


namespace App\Services\Pages\VM;


interface PageVMInterface
{
    public function title(): string;

    public function seo(): array;

    public function breadcrumbs(): array;
}
