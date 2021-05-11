<?php


namespace App\Services\Pages;


use App\Services\Projects\Facade\ProjectFacade;
use App\View\ViewFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PageSlugParser
{
    
    /**
     * @param string $slug
     * @return string
     */
    public static function parseSlugToNamespace(string $slug): string
    {
        $slug = collect(explode(config('page.delimiter.slug'), $slug))
            ->map(fn($slugItem) => Str::ucfirst(Str::lower($slugItem)))
            ->join(config('page.delimiter.namespace'));

        return config('page.view_model.namespace')
            . config('page.delimiter.namespace')
            . $slug
            . config('page.view_model.suffix');
    }

    /**
     * @param string $slug
     * @return string
     */
    public static function parseSlugToProjectNamespace(string $slug): string
    {
        $alias = ProjectFacade::getProject()->alias;
        $alias = Str::ucfirst(Str::lower($alias));

        $namespace = self::parseSlugToNamespace($slug);
        $defaultNamespace = config('page.view_model.namespace');

        return Str::replaceFirst(
            $defaultNamespace,
            $defaultNamespace . config('page.delimiter.namespace') . $alias,
            $namespace
        );
    }

    /**
     * @param string $slug
     * @return Collection
     */
    public static function parseSlugToNamespaces(string $slug): Collection
    {
        return collect([
            self::parseSlugToProjectNamespace($slug),
            self::parseSlugToNamespace($slug),
        ])->map(function ($namespace){
            return [
                $namespace,
                Str::replaceLast(config('page.view_model.suffix'), '', $namespace)
            ];
        })->collapse();
    }

    /**
     * @param string $slug
     * @return string
     */
    public static function parseSlugToDir(string $slug): string
    {
        $dir = config('page.template_dir');
        if(substr($dir, -1) !== config('page.delimiter.slug')){
            $dir .= config('page.delimiter.slug');
        }
        return $dir . $slug;
    }


    /**
     * @param string $slug
     * @return string
     */
    public static function parseSlugToProjectDir(string $slug): string
    {
        return implode(config('page.delimiter.slug'), [
            ViewFactory::FRONT_DIR_NAME,
            ProjectFacade::getProject()->alias,
            self::parseSlugToDir($slug)
        ]);
    }

    /**
     * @param string $slug
     * @return Collection
     */
    public static function parseSlugToDirs(string $slug): Collection
    {
        return collect([
            self::parseSlugToProjectDir($slug),
            self::parseSlugToDir($slug),
        ]);
    }

}
