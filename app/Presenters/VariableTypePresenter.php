<?php

namespace Portfolio\Presenters;

use Portfolio\Transformers\VariableTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VariableTypePresenter
 *
 * @package namespace Portfolio\Presenters;
 */
class VariableTypePresenter extends FractalPresenter {

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer() {
        return new VariableTypeTransformer();
    }

}
