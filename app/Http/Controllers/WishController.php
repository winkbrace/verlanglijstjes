<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DeleteWishRequest;
use App\Http\Requests\UpdateWishRequest;
use App\Http\Requests\WishActionRequest;
use App\Http\Requests\AddWishRequest;
use App\Jobs\FetchLinkPreview;
use App\View\Components\Alert;
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
    public function store(AddWishRequest $request)
    {
        $user = user();

        /** @var Wish $wish */
        $wish = Wish::create([
            'user_id' => $user->id,
            'description' => $request->input('gift'),
            'link' => $request->input('link'),
        ]);

        if ($wish->link) {
            $this->fetchLinkPreview($wish->id->toInt(), $wish->link);
        }

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
        $id = (int) $id;

        return view('wishes/edit', [
            'id' => $id, // We pass the received id here for the route() helper in case the wish with this id doesn't exist.
            'wish' => Wish::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishRequest $request, $id)
    {
        $id = (int) $id;

        $wish = Wish::find($id);
        $wish->description = $request->input('gift');
        $wish->link = $request->input('link');
        $wish->save();

        if ($wish->link) {
            $this->fetchLinkPreview($id, $wish->link);
        }

        return redirect()
            ->route('wish-list', ['name' => user()->name])
            ->with('alert', ['"'.$request->input('gift').'" is aangepast.' => Alert::SUCCESS]);
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

    private function fetchLinkPreview(int $id, string $url): void
    {
        try {
            dispatch(new FetchLinkPreview($id, $url));
        } catch (\Throwable) {
            // No problem
        }
    }
}
