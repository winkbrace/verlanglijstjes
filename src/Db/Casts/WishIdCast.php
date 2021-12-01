<?php declare(strict_types=1);

namespace Verlanglijstjes\Db\Casts;

use Verlanglijstjes\WishId;

final class WishIdCast extends IdCast
{
    protected string $class = WishId::class;
}
