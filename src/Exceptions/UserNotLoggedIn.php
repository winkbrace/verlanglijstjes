<?php declare(strict_types=1);

namespace Verlanglijstjes\Exceptions;

final class UserNotLoggedIn extends \Exception
{
    public static function notLoggedIn() : self
    {
        return new self("The current user is not logged in.");
    }
}
