<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface QuoteServiceInterface
{
    /**
     * Get five random quotes from an external API
     * the external api url is https://dummyjson.com/quotes/random
     *
     * @return array
     */
    public function getRandomQuotes(): array;

    /**
     * Get a random quote from an external API
     * the external api url is https://dummyjson.com/quotes/random
     *
     * @return object
     */
    public function getRandomQuote(): object;

    /**
     * Get a quotes from an external API by id's
     *
     * @param array $ids
     * @return array
     */
    public function getQuotesByIds(Collection $ids): array;

    /**
     * Get a quote from an external API by id
     * the external api url is https://dummyjson.com/quotes/{id}
     *
     * @param integer $id
     * @return object
     */
    public function getQuoteById(int $id): object;
}
