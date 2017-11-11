<?php

namespace Portfolio\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Portfolio\Entities\SiteSetting
 *
 * @property int $id
 * @property int $variable_type_id
 * @property string $name
 * @property string $value
 * @property-read VariableType $variableType
 * @method static Builder|SiteSetting whereId($value)
 * @method static Builder|SiteSetting whereName($value)
 * @method static Builder|SiteSetting whereValue($value)
 * @method static Builder|SiteSetting whereVariableTypeId($value)
 * @mixin \Eloquent
 */
class SiteSetting extends Model implements Transformable {

    use TransformableTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * Get the variable type assigned to this setting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function variableType() {
        return $this->belongsTo(VariableType::class);
    }

}
