<?php

namespace Portfolio\Providers;

use Illuminate\Support\ServiceProvider;
use Portfolio\Repositories\LanguageRepository;
use Portfolio\Repositories\LanguageRepositoryEloquent;
use Portfolio\Repositories\ProjectImageRepository;
use Portfolio\Repositories\ProjectImageRepositoryEloquent;
use Portfolio\Repositories\SiteSettingRepository;
use Portfolio\Repositories\SiteSettingRepositoryEloquent;
use Portfolio\Repositories\TechnologyRepository;
use Portfolio\Repositories\TechnologyRepositoryEloquent;
use Portfolio\Repositories\VariableTypeRepository;
use Portfolio\Repositories\VariableTypeRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {

        $this->app->bind(VariableTypeRepository::class, VariableTypeRepositoryEloquent::class);
        $this->app->bind(SiteSettingRepository::class, SiteSettingRepositoryEloquent::class);
        $this->app->bind(LanguageRepository::class, LanguageRepositoryEloquent::class);
        $this->app->bind(TechnologyRepository::class, TechnologyRepositoryEloquent::class);
        $this->app->bind(ProjectImageRepository::class, ProjectImageRepositoryEloquent::class);
        $this->app->bind(\Portfolio\Repositories\ProjectRepository::class, \Portfolio\Repositories\ProjectRepositoryEloquent::class);
        //:end-bindings:

    }

}
