<?php

namespace App\Services\Projects\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Services\Projects\Factory\ProjectDomainFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class ProjectDomain extends Model
{
    use HasFactory,
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
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['domain', 'is_ssl'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['project'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new ProjectDomainFactory();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
