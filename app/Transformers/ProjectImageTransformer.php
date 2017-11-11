<?php

namespace Portfolio\Transformers;

use League\Fractal\TransformerAbstract;
use Portfolio\Entities\ProjectImage;

/**
 * Class ProjectImageTransformer
 * @package namespace Portfolio\Transformers;
 */
class ProjectImageTransformer extends TransformerAbstract {

    /**
     * Transform the ProjectImage entity
     * @param ProjectImage $model
     *
     * @return array
     */
    public function transform(ProjectImage $model) {

        return [
            'id'         => (int)$model->id,
            'image_path' => $model->image_path
        ];

    }

}
