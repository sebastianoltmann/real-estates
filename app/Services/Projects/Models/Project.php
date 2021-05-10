<?php

namespace App\Services\Projects\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Services\Documents\Models\Document;
use App\Services\Permissions\Roles;
use App\Services\Projects\Factory\ProjectFactory;
use App\Services\RealEstates\Models\RealEstate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Laravel\Jetstream\Team;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;

/**
 * Class Project
 *
 * @property Collection realEstates
 * @property Collection projectDomains
 * @property Collection documents
 * @property string alias
 *
 * @method static flushQueryCache
 *
 * @package App\Services\Projects\Models
 */
class Project extends Team
{
    use HasFactory,
        HasTranslations,
        HasUuidAttribute,
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
    public $cacheFor = Carbon::SECONDS_PER_MINUTE * Carbon::MINUTES_PER_HOUR * Carbon::HOURS_PER_DAY * Carbon::DAYS_PER_WEEK;

    /**
     * @var string[]
     */
    public $translatable = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'alias', 'is_main'];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return new ProjectFactory();
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKeyName()
    {
        return $this->getUuidKeyName();
    }

    /**
     * @return HasMany
     */
    public function projectDomains(): HasMany
    {
        return $this->hasMany(ProjectDomain::class);
    }

    /**
     * @return HasMany
     */
    public function documents(): HasMany
    {
        return $this->allDocuments()->doesntHave('realEstates');
    }

    /**
     * @return HasMany
     */
    public function allDocuments(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * @return HasMany
     */
    public function realEstates(): HasMany
    {
        return $this->hasMany(RealEstate::class);
    }

}
