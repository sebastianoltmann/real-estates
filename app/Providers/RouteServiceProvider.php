<?php

namespace App\Providers;

use App\Services\Routing\ResourceLangRegistrar;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\PendingResourceRegistration;
use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/real-estates';
    public const HOME_ADMIN = '/admin/documents';


    public const NAME_ADMIN = 'admin';
    public const NAME_LIVEWIRE = 'livewire';



    public function register()
    {
        parent::register();
        $this->addResourceLangMacroToRouter();
    }

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * @return string|null
     */
    public static function getTranslationPrefix(): ?string
    {
        return LaravelLocalization::setLocale() ?? null;
    }

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function() {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix(self::getTranslationPrefix())
                ->name(self::NAME_ADMIN . '.')
                ->middleware('admin')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function(Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    private function addResourceLangMacroToRouter()
    {
        if(Router::hasMacro('resourceLang')) return;

        Router::macro('resourceLang', function($name, $controller, array $options = []){
            /**
             * @var Router $this
             */
            $registrar = new ResourceLangRegistrar($this);

            return new PendingResourceRegistration(
                $registrar, $name, $controller, $options
            );
        });
    }
}
