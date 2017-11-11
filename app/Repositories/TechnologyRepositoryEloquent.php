<?php

namespace Portfolio\Repositories;

use Portfolio\Presenters\TechnologyPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portfolio\Repositories\TechnologyRepository;
use Portfolio\Entities\Technology;
use Portfolio\Validators\TechnologyValidator;

/**
 * Class TechnologyRepositoryEloquent
 * @package namespace Portfolio\Repositories;
 */
class TechnologyRepositoryEloquent extends BaseRepository implements TechnologyRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Technology::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {
        return TechnologyValidator::class;
    }

    /**
     * Transform data to standard output
     *
     * @return string
     */
    public function presenter() {
        return TechnologyPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
