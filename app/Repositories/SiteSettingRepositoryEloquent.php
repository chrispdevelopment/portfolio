<?php

namespace Portfolio\Repositories;

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
     * Transform data to standard output
     *
     * @return string
     */
    public function presenter() {
        return SiteSettingPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
