<?php

namespace App\Services\Projects\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Models\User;
use App\Services\Projects\Factory\ProjectFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;
use Laravel\Jetstream\Team;


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
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new ProjectFactory();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectDomains()
    {
        return $this->hasMany(ProjectDomain::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
