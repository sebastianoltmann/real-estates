<?php

namespace App\Models;

use App\Common\Traits\Eloquent\HasUuidAttribute;
use App\Services\Permissions\Roles;
use App\Services\Projects\Models\Project;
use App\Services\Projects\Traits\HasProjects;
use App\Services\RealEstates\Models\RealEstate;
use App\Services\Users\Factories\UserFactory;
use App\Services\Users\Notifications\VerifyEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @method static Builder byProject(Project $project = null)
 * @method static Builder admins(Project $project = null)
 * @method static Builder allAdmins()
 *
 * @property string   $first_name
 * @property string   $last_name
 * @property string   $full_name
 * @property Collection   $ownRealEstates
 * @property Collection   $documents
 * @property Collection   $realEstates
 * @property Project|null $currentProject
 *
 * @package App\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,
        HasFactory,
        HasProfilePhoto,
        HasProjects,
        Notifiable,
        HasUuidAttribute,
        TwoFactorAuthenticatable,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attention', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_changed_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => Registered::class,
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function(User $user) {
            if(empty($user->password)){
                $user->password = Hash::make(Str::random(8));
            }
        });

        static::deleting(function(User $user) {
            if($user->forceDeleting) {
                $realEstates = $user->ownRealEstates;
                if(!$realEstates->isEmpty()) {
                    $user->ownRealEstates()->update([$user->getForeignKey() => null]);
                }
            }
        });
    }

    /**
     * @return HasMany
     */
    public function ownRealEstates(): HasMany
    {
        return $this->hasMany(RealEstate::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return UserFactory
     */
    protected static function newFactory(): UserFactory
    {
        return new UserFactory();
    }

    /**
     * @param Builder      $query
     * @param Project|null $project
     * @return Builder
     */
    public function scopeByProject(Builder $query, Project $project = null): Builder
    {
        if($project === null) $project = auth()->user()->currentProject;

        return $query->whereHas('projects', function(Builder $query) use ($project) {
            $query->where('project_id', $project->id);
        });
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return $this->getUuidKeyName();
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasProjectRole(Roles::ADMIN()->getValue());
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Determine if the user has changed their password.
     *
     * @return bool
     */
    public function hasChangedPassword()
    {
        return !is_null($this->password_changed_at);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
