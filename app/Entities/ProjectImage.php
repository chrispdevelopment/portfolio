<?php

namespace Portfolio\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Portfolio\Entities\ProjectImage
 *
 * @property int $id
 * @property int $project_id
 * @property string $image_path
 * @property-read Project $project
 * @method static Builder|ProjectImage whereId($value)
 * @method static Builder|ProjectImage whereImagePath($value)
 * @method static Builder|ProjectImage whereProjectId($value)
 * @mixin \Eloquent
 */
class ProjectImage extends Model implements Transformable {

    use TransformableTrait;

    public $timestamps = false;

    protected $fillable = [
        'project_id',
        'image_path',
    ];

    /**
     * Get the project for this project image
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project() {
        return $this->belongsTo(Project::class);
    }

}
