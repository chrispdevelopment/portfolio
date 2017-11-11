<?php

namespace Portfolio\Transformers;

use League\Fractal\TransformerAbstract;
use Portfolio\Entities\Language;

/**
 * Class LanguageTransformer
 * @package namespace Portfolio\Transformers;
 */
class LanguageTransformer extends TransformerAbstract {

    /**
     * Transform the Language entity
     * @param Language $model
     *
     * @return array
     */
    public function transform(Language $model) {

        return [
            'id'   => (int)$model->id,
            'name' => $model->name
        ];

    }
}
