<?php

namespace App\View;


use App\Services\Projects\Facade\ProjectFacade;
use App\View\Contracts\Viewable;
use Illuminate\Support\Str;
use Illuminate\View\Factory as BaseViewFactory;
use InvalidArgumentException;

class ViewFactory extends BaseViewFactory
{

    const FRONT_DIR_NAME = 'templates';
    const ADMIN_DIR_NAME = 'admin';

    /**
     * @var array
     */
    private $normalized = [];

    /**
     * @var array
     */
    private $views = [];

    /**
     * @return string
     */
    public function getFrontDir(): string
    {
        return self::FRONT_DIR_NAME;
    }

    /**
     * @return string
     */
    public function getAdminDir(): string
    {
        return self::ADMIN_DIR_NAME;
    }

    /**
     * @return string
     */
    private function getProjectDir(): string
    {
        return Str::slug(ProjectFacade::getProject()->alias);
    }


    /**
     * @param Viewable|string $view
     * @return array
     */
    private function generateAvailableViews($view): array
    {
        if($view instanceof Viewable)
            $view = $view->view();

        if(isset($this->views[$view]))
            return $this->views[$view];

        $views = [$view];

        if (!$this->isAdminView($view)){
            $views = array_merge([
                "{$this->getFrontDir()}.{$this->getProjectDir()}.{$view}"
            ], $views);
        }

        return $this->views[$view] = $views;
    }


    private function isAdminView(string $view): bool
    {
        return Str::startsWith($view, $this->getAdminDir());
    }

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param string $view
     * @param \Illuminate\Contracts\Support\Arrayable|array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\View
     */
    public function make($view, $data = [], $mergeData = [])
    {
        $views = $this->generateAvailableViews($view);

        foreach ($views as $view) {
            try {
                $path = $this->finder->find(
                    $view = $this->normalizeName($view)
                );
                break;
            } catch (\Exception $exception) {
                continue;
            }
        }

        if (empty($path)) {
            throw new InvalidArgumentException("View [{$view}] not found.");
        }

        // Next, we will create the view instance and call the view creator for the view
        // which can set any data, etc. Then we will return the view instance back to
        // the caller for rendering or performing other view manipulations on this.
        $data = array_merge($mergeData, $this->parseData($data));

        return tap($this->viewInstance($view, $path, $data), function ($view) {
            $this->callCreator($view);
        });
    }


    /**
     * Normalize a view name.
     *
     * @param  string $name
     * @return string
     */
    protected function normalizeName($name)
    {
        if (isset($this->normalized[$name])) {
            return $this->normalized[$name];
        }

        return $this->normalized[$name] = parent::normalizeName($name);
    }

    /**
     * Determine if a given view exists.
     *
     * @param string $view
     * @return bool
     */
    public function exists($view): bool
    {
        $views = $this->generateAvailableViews($view);

        foreach ($views as $view) {
            if (parent::exists($view))
                return true;
        }
        return false;
    }
}
