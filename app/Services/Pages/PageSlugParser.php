<?php


namespace App\Services\Pages;


use App\Services\Projects\Facade\ProjectFacade;
use App\View\ViewFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PageSlugParser
{

    const NAMESPACE = 'App\\Services\\Pages\\VM';
    const NAMESPACE_SUFFIX = 'VM';
    const NAMESPACE_DELIMITER = '\\';

    const TEMPLATE_DIR = 'pages/';

    const SLUG_DELIMITER = '/';

    /**
     * @param string $slug
     * @return string
     */
    public static function parseSlugToNamespace(string $slug): string
    {
        $slug = collect(explode(self::SLUG_DELIMITER, $slug))
            ->map(fn($slugItem) => Str::ucfirst(Str::lower($slugItem)))
            ->join(self::NAMESPACE_DELIMITER);

        return self::NAMESPACE . self::NAMESPACE_DELIMITER . $slug . self::NAMESPACE_SUFFIX;
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
        return Str::replaceFirst(
            self::NAMESPACE,
            self::NAMESPACE . self::NAMESPACE_DELIMITER . $alias,
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
                Str::replaceLast(self::NAMESPACE_SUFFIX, '', $namespace)
            ];
        })->collapse();
    }

    /**
     * @param string $slug
     * @return string
     */
    public static function parseSlugToDir(string $slug): string
    {
        return self::TEMPLATE_DIR . $slug;
    }


    /**
     * @param string $slug
     * @return string
     */
    public static function parseSlugToProjectDir(string $slug): string
    {
        return implode(self::SLUG_DELIMITER, [
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
