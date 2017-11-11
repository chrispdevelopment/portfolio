<?php

namespace Portfolio\Repositories;

use Portfolio\Presenters\VariableTypePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portfolio\Repositories\VariableTypeRepository;
use Portfolio\Entities\VariableType;
use Portfolio\Validators\VariableTypeValidator;

/**
 * Class VariableTypeRepositoryEloquent
 * @package namespace Portfolio\Repositories;
 */
class VariableTypeRepositoryEloquent extends BaseRepository implements VariableTypeRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return VariableType::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {
        return VariableTypeValidator::class;
    }

    /**
     * Transform data to standard output
     *
     * @return string
     */
    public function presenter() {
        return VariableTypePresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
