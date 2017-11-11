<?php

namespace Portfolio\Repositories;

use Portfolio\Presenters\ProjectImagePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portfolio\Repositories\ProjectImageRepository;
use Portfolio\Entities\ProjectImage;
use Portfolio\Validators\ProjectImageValidator;

/**
 * Class ProjectImageRepositoryEloquent
 * @package namespace Portfolio\Repositories;
 */
class ProjectImageRepositoryEloquent extends BaseRepository implements ProjectImageRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return ProjectImage::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {
        return ProjectImageValidator::class;
    }

    /**
     * Transform data to standard output
     *
     * @return string
     */
    public function presenter() {
        return ProjectImagePresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
