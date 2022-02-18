<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Verlanglijstjes\User;
use Verlanglijstjes\Wish;

final class HomeController extends Controller
{
    public function show()
    {
        return view('home', [
            'users' => User::orderBy('position')->get(),
        ]);
    }
}
