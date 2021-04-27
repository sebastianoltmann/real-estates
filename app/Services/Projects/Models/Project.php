<?php

namespace App\Services\Projects\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Services\Documents\Models\Document;
use App\Services\Permissions\Roles;
use App\Services\Projects\Factory\ProjectFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Jetstream\Team;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;

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
        return 'uuid';
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
        return $this->hasMany(Document::class);
    }

    /**
     * @return BelongsToMany
     */
    public function usersAdmins(): BelongsToMany
    {
        return $this->users()->whereIn('role', [
            Roles::ADMIN()->getValue(),
            Roles::SUPER_ADMIN()->getValue(),
        ]);
    }

    /**
     * @return BelongsToMany
     */
    public function usersWithoutAdmins(): BelongsToMany
    {
        return $this->users()->whereNotIn('role', [
            Roles::ADMIN()->getValue(),
            Roles::SUPER_ADMIN()->getValue(),
        ]);
    }
}
