<?php

namespace Portfolio\Presenters;

use Portfolio\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectPresenter
 *
 * @package namespace Portfolio\Presenters;
 */
class ProjectPresenter extends FractalPresenter {

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer() {
        return new ProjectTransformer();
    }

}
