<?php

namespace App\Services\Documents\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Services\Documents\Factories\DocumentCategoryFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * @return HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
