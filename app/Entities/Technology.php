<?php

namespace Portfolio\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Portfolio\Entities\Technology
 *
 * @property int $id
 * @property string $name
 * @property string $image_path
 * @property-read Collection|Project[] $projects
 * @method static Builder|Technology whereId($value)
 * @method static Builder|Technology whereImagePath($value)
 * @method static Builder|Technology whereName($value)
 * @mixin \Eloquent
 */
class Technology extends Model implements Transformable {

    use TransformableTrait;

    protected $fillable = [
        'name',
        'image_path',
    ];

    /**
     * Get all the projects related to this technology
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects() {
        return $this->belongsToMany(Project::class, 'project_technologies');
    }

}
