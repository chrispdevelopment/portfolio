<?php

namespace Portfolio\Repositories;

use Portfolio\Presenters\LanguagePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portfolio\Repositories\LanguageRepository;
use Portfolio\Entities\Language;
use Portfolio\Validators\LanguageValidator;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class LanguageRepositoryEloquent
 * @package namespace Portfolio\Repositories;
 */
class LanguageRepositoryEloquent extends BaseRepository implements LanguageRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Language::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {
        return LanguageValidator::class;
    }

    /**
     * Transform data to standard output
     *
     * @return string
     */
    public function presenter() {
        return LanguagePresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
