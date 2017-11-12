<?php

namespace Portfolio\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Portfolio\Entities\Project
 *
 * @property int $id
 * @property int $language_id
 * @property string $name
 * @property string $description
 * @property string|null $git_link
 * @property string|null $site_link
 * @property-read Language $language
 * @property-read Collection|ProjectImage[] $projectImages
 * @property-read Collection|Technology[] $technologies
 * @method static Builder|Project whereDescription($value)
 * @method static Builder|Project whereGitLink($value)
 * @method static Builder|Project whereId($value)
 * @method static Builder|Project whereLanguageId($value)
 * @method static Builder|Project whereName($value)
 * @method static Builder|Project whereSiteLink($value)
 * @mixin \Eloquent
 */
class Project extends Model implements Transformable {

    use TransformableTrait;

    public $timestamps = false;

    protected $fillable = [
        'language_id',
        'name',
        'description',
        'git_link',
        'site_link',
    ];

    /**
     * Get all the project images related to this project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectImages() {
        return $this->hasMany(ProjectImage::class);
    }

    /**
     * Get all the technologies related to this project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies() {
        return $this->belongsToMany(Technology::class, 'project_technologies');
    }

    /**
     * Get the language for this project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language() {
        return $this->belongsTo(Language::class);
    }

}
