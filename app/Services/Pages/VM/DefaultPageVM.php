<?php


namespace App\Services\Pages\VM;


use App\Services\Pages\PageSlugParser;
use App\View\ViewModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class DefaultPageVM extends ViewModel implements PageVMInterface
{
    /**
     * @var Collection
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
        $this->slugParams = collect(explode(config('page.delimiter.slug'), $this->slug));
        $this->setView($this->template());
    }

    public function title(): string
    {
        return $this->makeTitle($this->slugParams->last());
    }

    private function makeTitle($string)
    {
        return Str::title(Str::slug($string, ' '));
    }

    public function seo(): array
    {
        return [];
    }

    /**
     * @return Collection|array
     */
    public function breadcrumbs(): Collection|array
    {
        return  collect([[
            'title' => __('Home'),
            'url' => route('pages.index')
        ]])->merge($this->slugParams->mapWithKeys(function($slug, $i){
            $url = $this->slugParams
                ->take($i + 1)
                ->join(config('page.delimiter.slug'));

            return [ $i => [
                'title' => $this->makeTitle($slug),
                'url' => route('pages.show', $url),
            ]];
        }));
    }

    private function template(): ?string
    {
        return PageSlugParser::parseSlugToDirs($this->slug)
            ->filter(fn($template) => View::exists($template))
            ->first();
    }
}
