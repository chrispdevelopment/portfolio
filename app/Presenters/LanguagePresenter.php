<?php

namespace Portfolio\Presenters;

use Portfolio\Transformers\LanguageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LanguagePresenter
 *
 * @package namespace Portfolio\Presenters;
 */
class LanguagePresenter extends FractalPresenter {

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer() {
        return new LanguageTransformer();
    }

}
