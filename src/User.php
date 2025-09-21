<?php declare(strict_types=1);

namespace Verlanglijstjes;

use Illuminate\Database\Eloquent\Builder;
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
 * @property int generation
 * @property int position
 * @property string avatar
 * @property string chocolate_preference
 *
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

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

    public function avatarUrl(): string
    {
        return str_replace('/var/www/html/public', '', $this->avatar);
    }

    /**
     * To guarantee unique names, we add the email address when people log in via google: "name (email)")
     * That makes the username too long for the app, so we show only the name. Note that google users are always guests,
     * so this is only required in the navigation bar.
     */
    public function displayName(): string
    {
        // show name but remove anything between brackets
        return trim(preg_replace('/\([^)]+\)/', '', $this->name));
    }

    public function isGuest(): bool
    {
        return $this->name === 'Gast' || $this->google_id !== null;
    }
}
