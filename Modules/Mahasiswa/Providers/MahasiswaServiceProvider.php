<?php

namespace Modules\Mahasiswa\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Mahasiswa\Events\Handlers\RegisterMahasiswaSidebar;

class MahasiswaServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterMahasiswaSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('mahasiswas', array_dot(trans('mahasiswa::mahasiswas')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('mahasiswa', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Mahasiswa\Repositories\MahasiswaRepository',
            function () {
                $repository = new \Modules\Mahasiswa\Repositories\Eloquent\EloquentMahasiswaRepository(new \Modules\Mahasiswa\Entities\Mahasiswa());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Mahasiswa\Repositories\Cache\CacheMahasiswaDecorator($repository);
            }
        );
// add bindings

    }
}
