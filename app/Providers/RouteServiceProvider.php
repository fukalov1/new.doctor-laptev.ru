<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use App\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    public const HOME = '/';
    public const MESSAGE = '/message';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        if (Schema::hasTable('pages')) {
            $router->group(['middleware' => ['web', 'enable']], function ($router) {
                $pages = Page::all();
                foreach ($pages as $page) {
                    if ($page->only_auth) {
                        $router->get($page->url,
                            [
                                'as' => $page->route_name, function () use ($page, $router) {
                                return $this->app->call('App\Http\Controllers\PageController@show',
                                    [
                                        'page' => $page,
                                        'parameters' => $router->current()->parameters
                                    ]);
                            }])->middleware('auth');
                    }
                    else {
                        $router->get($page->url,
                            [
                                'as' => $page->route_name, function () use ($page, $router) {
                                return $this->app->call('App\Http\Controllers\PageController@show',
                                    [
                                        'page' => $page,
                                        'parameters' => $router->current()->parameters
                                    ]);
                            }]);
                    }
                }
            });
        }

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
