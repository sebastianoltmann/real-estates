<?php

namespace App\Services\Documents\Models;

use App\Common\Traits\Eloquent\HasCreator;
use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Models\User;
use App\Services\Documents\Events\DocumentHasBeenUpdated;
use App\Services\Documents\Factories\DocumentFactory;
use App\Services\Projects\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use App\Services\Documents\Traits\HasFileDocument;

class Document extends Model implements HasMedia
{
    use HasFactory,
        HasUuidAttribute,
        HasTranslations,
        HasCreator,
        SoftDeletes,
        HasFileDocument;

    const CREATED_BY = 'created_by';

    const UPDATED_BY = 'updated_by';

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
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'updated' => DocumentHasBeenUpdated::class,
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->getUuidKeyName();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return new DocumentFactory();
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function documentCategory(): BelongsTo
    {
       return $this->belongsTo(DocumentCategory::class);
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->documentCategory();
    }
}
