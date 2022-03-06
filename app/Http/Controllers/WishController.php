<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DeleteWishRequest;
use App\Http\Requests\WishActionRequest;
use App\Http\Requests\WishRequest;
use App\View\Components\Alert;
use Illuminate\Http\Request;
use Verlanglijstjes\User;
use Verlanglijstjes\Wish;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('wishes/index', [
            'title' => $user->name,
            'wishes' => $user->wishedItems()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wishes/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WishRequest $request)
    {
        $user = user();

        Wish::create([
            'user_id' => $user->id,
            'description' => $request->input('gift'),
            'link' => $request->input('link'),
        ]);

        return redirect()
            ->route('wish-list', ['name' => $user->name])
            ->with('alert', ['"'.$request->input('gift').'" is toegevoegd.' => Alert::SUCCESS]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteWishRequest $request, $id)
    {
        Wish::destroy($id);
    }

    public function claim(WishActionRequest $request)
    {
        $wish = Wish::find($request->input('id'));
        $user = user();

        if ($request->input('action') === 'claim') {
            $wish->claimed_at = now();
            $wish->claimed_by = $user->id;
        } else {
            $wish->claimed_at = null;
            $wish->claimed_by = null;
        }
        $wish->save();
    }
}
