<?php

namespace Portfolio\Packages\Settings;

use Illuminate\Support\ServiceProvider;
use Portfolio\Repositories\SiteSettingRepository;

class SettingsServiceProvider extends ServiceProvider {

    /**
     * @var SiteSettingRepository
     */
    protected $repository;

    /**
     * Bootstrap the application services.
     *
     * @param SiteSettingRepository $repository
     * @return void
     */
    public function boot(SiteSettingRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Register the application services.
     */
    public function register() {
        $this->app->singleton('settings', function () {
            return new SettingService($this->repository);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['settings'];
    }

}
