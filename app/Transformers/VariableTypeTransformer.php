<?php

namespace Portfolio\Transformers;

use League\Fractal\TransformerAbstract;
use Portfolio\Entities\VariableType;

/**
 * Class VariableTypeTransformer
 * @package namespace Portfolio\Transformers;
 */
class VariableTypeTransformer extends TransformerAbstract {

    /**
     * Transform the VariableType entity
     * @param VariableType $model
     *
     * @return array
     */
    public function transform(VariableType $model) {

        return [
            'id'   => (int)$model->id,
            'name' => $model->name
        ];

    }

}
