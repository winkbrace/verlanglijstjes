<?php declare(strict_types=1);

namespace Verlanglijstjes;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Verlanglijstjes\Db\Casts\UserIdCast;
use Verlanglijstjes\Db\Casts\WishIdCast;

/**
 * This Eloquent Model represents a wish of a user
 *
 * @property WishId id
 * @property UserId user_id
 * @property string description
 * @property string link
 * @property UserId claimed_by
 * @property CarbonImmutable claimed_at
 * @property CarbonImmutable created_at
 * @property CarbonImmutable updated_at
 * @property CarbonImmutable deleted_at
 */
class Wish extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'description',
        'link'
    ];

    protected $casts = [
        'id' => WishIdCast::class,
        'user_id' => UserIdCast::class,
        'claimed_by' => UserIdCast::class,
        'claimed_at' => 'immutable_datetime',
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
        'deleted_at' => 'immutable_datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function claimedBy()
    {
        return $this->belongsTo(User::class, 'claimed_by');
    }

    public function linkPreview()
    {
        return $this->hasOne(LinkPreview::class);
    }
}
