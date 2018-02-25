<?php

namespace Portfolio\Repositories;

use Illuminate\Support\Collection;
use Portfolio\Presenters\SiteSettingPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portfolio\Repositories\SiteSettingRepository;
use Portfolio\Entities\SiteSetting;
use Portfolio\Validators\SiteSettingValidator;

/**
 * Class SiteSettingRepositoryEloquent
 * @package namespace Portfolio\Repositories;
 */
class SiteSettingRepositoryEloquent extends BaseRepository implements SiteSettingRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return SiteSetting::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {
        return SiteSettingValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get all settings with their values converted to the correct variable type
     *
     * @return \Illuminate\Support\Collection|SiteSetting[]
     */
    public function getAllSettings() {

        $settings = $this->with('variableType')->all();

        return $this->settingValueTransform($settings);

    }

    /**
     * Convert the values for each entry in the collection into the correct variable type
     *
     * @param \Illuminate\Support\Collection|SiteSetting[] $settings
     *
     * @return \Illuminate\Support\Collection|SiteSetting[]
     */
    private function settingValueTransform(Collection $settings) {

        return $settings->transform(function($setting) {
            /** @var SiteSetting $setting */
            $settingValue = $setting->value;

            settype($settingValue, $setting->variableType->name);

            $setting->value = $settingValue;

            return $setting;
        });

    }

}
