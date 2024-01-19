<?php

namespace App\Http\Controllers;

use App\Contracts\QuoteServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Inertia\Inertia;

class QuoteController extends Controller
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
    public function random()
    {
        $quotes = $this->quoteService->getRandomQuotes();

        // Filtrar resultados nulos
        return response()->json($quotes);
    }

    public function index() {
        $quotes = $this->quoteService->getRandomQuotes();

        return Inertia::render('Dashboard/Quotes', [
            'quotes' => $quotes,
        ]);
    }
}
