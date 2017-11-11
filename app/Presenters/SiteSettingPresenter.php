<?php

namespace Portfolio\Presenters;

use Portfolio\Transformers\SiteSettingTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SiteSettingPresenter
 *
 * @package namespace Portfolio\Presenters;
 */
class SiteSettingPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SiteSettingTransformer();
    }
}
