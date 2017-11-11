<?php

namespace Portfolio\Repositories;

use Portfolio\Presenters\ProjectPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portfolio\Repositories\ProjectRepository;
use Portfolio\Entities\Project;
use Portfolio\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace Portfolio\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Project::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {
        return ProjectValidator::class;
    }

    /**
     * Transform data to standard output
     *
     * @return string
     */
    public function presenter() {
        return ProjectPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
