<?php

namespace Portfolio\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Portfolio\Entities\VariableType
 *
 * @property int $id
 * @property string $name
 * @property-read Collection|SiteSetting[] $siteSettings
 * @method static Builder|VariableType whereId($value)
 * @method static Builder|VariableType whereName($value)
 * @mixin \Eloquent
 */
class VariableType extends Model implements Transformable {

    use TransformableTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    /**
     * Get all the site settings that use this variable type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siteSettings() {
        return $this->hasMany(SiteSetting::class);
    }

}
