<?php

namespace Verlanglijstjes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Verlanglijstjes\Db\Casts\UserIdCast;

/**
 * This Eloquent Model represents a user and allows the user to log in
 *
 * @property UserId id
 * @property string name
 * @property string email
 * @property int tier
 * @property int position
 * @property string avatar
 * @property string chocolate_preference
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tier',
        'position',
        'avatar',
        'chocolate_preference',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'id' => UserIdCast::class,
        'email_verified_at' => 'immutable_datetime',
    ];

    public function wishedItems(): HasMany
    {
        return $this->hasMany(Wish::class, 'user_id');
    }

    public function claimedItems(): HasMany
    {
        return $this->hasMany(Wish::class, 'claimed_by');
    }
}
