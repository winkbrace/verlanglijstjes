<?php declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Verlanglijstjes\Exceptions\UserNotLoggedIn;
use Verlanglijstjes\User;
use Verlanglijstjes\UserId;

/**
 * Get the logged-in user or throw exception when user is not logged in.
 * Using this method avoids the null pointer warning.
 */
function user() : User
{
    $user = Auth::user();

    if ( ! $user instanceof User) {
        throw UserNotLoggedIn::notLoggedIn();
    }

    return $user;
}

/**
 * Get the id of the logged-in user.
 * Using this method avoids the null pointer warning.
 */
function userId() : UserId
{
    return user()->id;
}
