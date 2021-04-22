<?php

namespace App\Models;

use App\Services\Documents\Models\Document;
use App\Services\Projects\Traits\HasProjects;
use App\Services\Users\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        HasProfilePhoto,
        HasProjects,
        Notifiable,
        TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Create a new factory instance for the model.
     *
     * @return UserFactory
     */
    protected static function newFactory(): UserFactory
    {
        return new UserFactory();
    }

    /**
     * @return BelongsToMany
     */
    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }

}
