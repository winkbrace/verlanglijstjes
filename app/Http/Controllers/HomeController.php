<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Verlanglijstjes\User;

final class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    /**
     * Display a listing of the chocoladeletter preferences
     */
    public function letters()
    {
        $users = User::query()
            ->where('name', '!=', 'Gast')
            ->orderBy('position')
            ->get();

        return view('letters', [
            'users' => $users,
        ]);
    }
}
