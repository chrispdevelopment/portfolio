<?php

namespace Portfolio\Presenters;

use Portfolio\Transformers\ProjectImageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectImagePresenter
 *
 * @package namespace Portfolio\Presenters;
 */
class ProjectImagePresenter extends FractalPresenter {

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer() {
        return new ProjectImageTransformer();
    }

}
