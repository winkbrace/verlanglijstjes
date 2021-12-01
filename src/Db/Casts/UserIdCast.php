<?php declare(strict_types=1);

namespace Verlanglijstjes\Db\Casts;

use Verlanglijstjes\UserId;

final class UserIdCast extends IdCast
{
    protected string $class = UserId::class;
}
