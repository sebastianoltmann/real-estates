<?php

namespace App\Services\RealEstates\Models;

use App\Common\Traits\Eloquent\HasSlugAttribute;
use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Models\User;
use App\Services\Documents\Models\Document;
use App\Services\Eloquent\TranslatableBuilder;
use App\Services\Projects\Models\Project;
use App\Services\RealEstates\Factory\RealEstateFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class RealEstate
 *
 * @property Project|null project
 * @property User|null    owner
 * @property bool         sold
 * @property Collection   users
 * @property Collection   documents
 *
 * @method static Builder ByProject(Project $project = null)
 *
 * @package App\Services\RealEstates\Models
 */
class RealEstate extends Model
{
    use HasFactory,
        HasUuidAttribute,
        HasSlugAttribute,
        HasTranslations,
        SoftDeletes;

    /**
     * @var string[]
     */
    public $translatable = ['name', 'slug'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type', 'name', 'alias', 'slug',
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function(RealEstate $realEstate) {
            if($realEstate->forceDeleting){
                $documents = $realEstate->documents;
                if(!$documents->isEmpty()){
                    $realEstate->documents()->sync([]);
                    $documents->each->forceDelete();
                }
            }
        });
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return isAdminRequest() ? $this->getUuidKeyName() : $this->getSlugKeyName();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return new RealEstateFactory();
    }

    /**
     * @param Builder      $query
     * @param Project|null $project
     * @return Builder
     */
    public function scopeByProject(Builder $query, Project $project = null)
    {
        if($project === null) $project = auth()->user()->currentProject;

        return $query->whereHas('project', function(Builder $query) use ($project){
            $query->whereId($project->id);
        });
    }

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return bool
     */
    public function getSoldAttribute(): bool
    {
        return $this->owner instanceof User;
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new TranslatableBuilder($query);
    }
}
