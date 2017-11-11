<?php

namespace Portfolio\Transformers;

use League\Fractal\TransformerAbstract;
use Portfolio\Entities\Technology;

/**
 * Class TechnologyTransformer
 * @package namespace Portfolio\Transformers;
 */
class TechnologyTransformer extends TransformerAbstract {

    /**
     * Transform the Technology entity
     * @param Technology $model
     *
     * @return array
     */
    public function transform(Technology $model) {

        return [
            'id'         => (int)$model->id,
            'name'       => $model->name,
            'image_path' => $model->image_path
        ];

    }

}
