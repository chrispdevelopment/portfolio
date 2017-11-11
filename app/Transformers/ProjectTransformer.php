<?php

namespace Portfolio\Transformers;

use League\Fractal\TransformerAbstract;
use Portfolio\Entities\Project;

/**
 * Class ProjectTransformer
 * @package namespace Portfolio\Transformers;
 */
class ProjectTransformer extends TransformerAbstract {

    /**
     * Transform the Project entity
     * @param Project $model
     *
     * @return array
     */
    public function transform(Project $model) {

        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'description' => $model->description,
            'git_link' => $model->git_link,
            'site_link' => $model->site_link
        ];

    }

}
