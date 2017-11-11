<?php

namespace Portfolio\Transformers;

use League\Fractal\TransformerAbstract;
use Portfolio\Entities\SiteSetting;

/**
 * Class SiteSettingTransformer
 * @package namespace Portfolio\Transformers;
 */
class SiteSettingTransformer extends TransformerAbstract {

    /**
     * Transform the SiteSetting entity
     * @param SiteSetting $model
     *
     * @return array
     */
    public function transform(SiteSetting $model) {

        return [
            'id'    => (int)$model->id,
            'name'  => $model->name,
            'value' => $model->value
        ];

    }

}
