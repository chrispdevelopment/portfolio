<?php

namespace Portfolio\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Portfolio\Entities\Language
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|Project[] $projects
 * @method static Builder|Language whereId($value)
 * @method static Builder|Language whereName($value)
 * @mixin \Eloquent
 */
class Language extends Model implements Transformable {

    use TransformableTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    /**
     * Get all the projects related to this language
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects() {
        return $this->hasMany(Project::class);
    }

}
