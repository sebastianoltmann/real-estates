<?php

namespace App\Services\Documents\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Services\Documents\Factories\DocumentCategoryFactory;
use App\Services\Projects\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;

/**
 * Class DocumentCategory
 *
 * @property Collection $documents
 * @property Collection $documentsWithoutRealEstates
 * @property Collection $documentsWithRealEstates
 * @package App\Services\Documents\Models
 */
class DocumentCategory extends Model
{
    use HasFactory,
        HasUuidAttribute,
        HasTranslations,
        QueryCacheable;

    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    /**
     * @var int
     */
    public $cacheFor = Carbon::SECONDS_PER_MINUTE * Carbon::MINUTES_PER_HOUR;

    /**
     * @var string[]
     */
    public $translatable = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return new DocumentCategoryFactory();
    }

    /**
     * @param Project|null $project
     * @return HasMany
     */
    public function documentsByProject(Project $project = null): HasMany
    {
        if($project === null) $project = auth()->user()->currentProject;

        return $this->documents()->whereHas('project', function(Builder $query) use ($project) {
            $query->whereId($project->id);
        });
    }

    /**
     * @return HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * @return HasMany
     */
    public function documentsWithoutRealEstates(): HasMany
    {
        return $this->documentsByProject()->whereDoesntHave('realEstates');
    }

    /**
     * @return HasMany
     */
    public function documentsWithRealEstates(): HasMany
    {
        return $this->documentsByProject()->whereHas('realEstates');
    }
}
