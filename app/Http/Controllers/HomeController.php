<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Verlanglijstjes\User;
use Verlanglijstjes\Wish;

final class HomeController extends Controller
{
    public function show()
    {
        $wish = Wish::find(1);
        $user = $wish->user;

        dd(Wish::with('claimedBy')->get());

        return view('home', [
            'table' => $table->all(),
        ]);
    }
}
