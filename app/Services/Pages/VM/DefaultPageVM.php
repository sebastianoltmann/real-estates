<?php


namespace App\Services\Pages\VM;


use App\Services\Pages\PageSlugParser;
use App\View\ViewModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class DefaultPageVM extends ViewModel implements PageVMInterface
{
    /**
     * @var string[]
     */
    private $slugParams;

    /**
     * DefaultPageVM constructor.
     *
     * @param string $slug
     */
    public function __construct(
        public string $slug
    )
    {
        $this->slugParams = explode(config('page.delimiter.slug'), $this->slug);
        $this->setView($this->template());
    }

    private function template(): ?string
    {
        return PageSlugParser::parseSlugToDirs($this->slug)
            ->filter(fn($template) => View::exists($template))
            ->first();
    }

    public function title(): string
    {
        return Str::title(Str::slug(Arr::last($this->slugParams), ' '));
    }

    public function seo(): array
    {
        return [];
    }

    public function breadcrumbs(): array
    {
        return [];
    }
}
