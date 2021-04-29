<?php

namespace App\Services\RealEstates\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Models\User;
use App\Services\Documents\Models\Document;
use App\Services\Projects\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class RealEstate
 *
 * @property Project|null project
 * @property User|null owner
 * @property Collection users
 * @property Collection documents
 *
 * @package App\Services\RealEstates\Models
 */
class RealEstate extends Model
{
    use HasFactory,
        HasUuidAttribute,
        HasTranslations;

    /**
     * @var string[]
     */
    public $translatable = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type', 'name', 'alias'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->getUuidKeyName();
    }

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function documents() :BelongsToMany
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
}
