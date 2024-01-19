<?php

namespace App\Http\Controllers;

use App\Contracts\QuoteServiceInterface;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Models\Favorite;
use Inertia\Inertia;

class FavoriteController extends Controller
{
    protected QuoteServiceInterface $quoteService;

    public function __construct(QuoteServiceInterface $quoteService) {
        $this->quoteService = $quoteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::all()->where(
            'user_id', auth()->user()->id
        );

        $quoteIds = $favorites->pluck('quote_id');

        $quotes = $this->quoteService->getQuotesByIds($quoteIds);

        return Inertia::render('Dashboard/Favorites', [ 'quotes' => $quotes ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFavoriteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavoriteRequest $request)
    {
        $user_id = $request->input('user_id');
        $quote_id = $request->input('quote_id');

        $favorite = Favorite::create([
            'user_id' => $user_id,
            'quote_id' => $quote_id,
        ]);

        return Inertia::render('Dashboard/Favorite', [ 'favorite' => $favorite ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        $quote_id = $favorite->input('quote_id');

        $favoriteQuote = $this->quoteService->getQuoteById($quote_id);

        return Inertia::render('Dashboard/Favorite', [ 'favoriteQuote' => $favoriteQuote ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoriteRequest  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
