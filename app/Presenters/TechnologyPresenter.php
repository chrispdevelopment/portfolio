<?php

namespace Portfolio\Presenters;

use Portfolio\Transformers\TechnologyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TechnologyPresenter
 *
 * @package namespace Portfolio\Presenters;
 */
class TechnologyPresenter extends FractalPresenter {

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer() {
        return new TechnologyTransformer();
    }

}
