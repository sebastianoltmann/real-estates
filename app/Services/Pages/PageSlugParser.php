<?php


namespace App\Services\Pages;


use App\Services\Projects\Facade\ProjectFacade;
use App\View\ViewFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class PageSlugParser
{

    /**
     * @param string $slug
     * @return Collection
     */
    public static function parseSlugToNamespaces(string $slug): Collection
    {
        return collect([
            self::parseSlugToProjectNamespace($slug, true),
            self::parseSlugToProjectNamespace($slug),
            self::parseSlugToNamespace($slug, true),
            self::parseSlugToNamespace($slug),
        ])->map(function($namespace) {
            return [
                $namespace,
                Str::replaceLast(config('page.view_model.suffix'), '', $namespace),
            ];
        })->collapse()
            ->unique();
    }

    /**
     * @param string $slug
     * @param bool   $multiLang
     * @return string
     */
    public static function parseSlugToProjectNamespace(string $slug, bool $multiLang = false): string
    {
        $alias = ProjectFacade::getProject()->alias;
        $alias = Str::ucfirst(Str::lower($alias));

        $namespace = self::parseSlugToNamespace($slug, $multiLang);
        $defaultNamespace = config('page.view_model.namespace');

        return Str::replaceFirst(
            $defaultNamespace,
            $defaultNamespace . config('page.delimiter.namespace') . $alias,
            $namespace
        );
    }

    /**
     * @param string $slug
     * @param bool   $multiLang
     * @return string
     */
    public static function parseSlugToNamespace(string $slug, bool $multiLang = false): string
    {
        $slug = collect(explode(config('page.delimiter.slug'), $slug))
            ->map(fn($slugItem) => Str::ucfirst(Str::lower($slugItem)))
            ->join(config('page.delimiter.namespace'));

        return config('page.view_model.namespace')
            . config('page.delimiter.namespace')
            . ($multiLang && config('page.multiLang')
                ? self::getLangSubNamespace()
                : null)
            . $slug
            . config('page.view_model.suffix');
    }

    /**
     * @return string
     */
    private static function getLangSubNamespace(): string
    {
        return Str::ucfirst(App::getLocale()) . config('page.delimiter.namespace');
    }

    /**
     * @return string
     */
    private static function getLangSubDir(): string
    {
        return Str::lower(App::getLocale()) . config('page.delimiter.slug');
    }

    /**
     * @param string $slug
     * @return Collection
     */
    public static function parseSlugToDirs(string $slug): Collection
    {
        return collect([
            self::parseSlugToProjectDir($slug, true),
            self::parseSlugToProjectDir($slug),
            self::parseSlugToDir($slug, true),
            self::parseSlugToDir($slug),
        ])->unique();
    }

    /**
     * @param string $slug
     * @param bool   $multiLang
     * @return string
     */
    public static function parseSlugToProjectDir(string $slug, bool $multiLang = false): string
    {
        return implode(config('page.delimiter.slug'), [
            ViewFactory::FRONT_DIR_NAME,
            ProjectFacade::getProject()->alias,
            self::parseSlugToDir($slug, $multiLang),
        ]);
    }

    /**
     * @param string $slug
     * @param bool   $multiLang
     * @return string
     */
    public static function parseSlugToDir(string $slug, bool $multiLang = false): string
    {
        $dir = config('page.template_dir');
        if(substr($dir, -1) !== config('page.delimiter.slug')) {
            $dir .= config('page.delimiter.slug');
        }
        return $dir
            . ($multiLang && config('page.multiLang')
                ? self::getLangSubDir()
                : null)
            . $slug;
    }

}
