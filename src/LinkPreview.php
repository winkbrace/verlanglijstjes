<?php declare(strict_types=1);

namespace Verlanglijstjes;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Verlanglijstjes\Db\Casts\WishIdCast;

/**
 * This Eloquent Model represents a link preview made of the link provided by a user
 *
 * @property int id
 * @property WishId wish_id
 * @property string title
 * @property string description
 * @property string link
 * @property string image
 * @property CarbonImmutable updated_at
 * @property CarbonImmutable deleted_at
 */
class LinkPreview extends Model
{
    use HasFactory;

    protected $casts = [
        'wish_id' => WishIdCast::class,
        'updated_at' => 'immutable_datetime',
        'deleted_at' => 'immutable_datetime',
    ];
}
