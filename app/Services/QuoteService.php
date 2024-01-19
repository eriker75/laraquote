<?php

namespace App\Services;

use App\Contracts\QuoteServiceInterface;
use Dotenv\Exception\ValidationException;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Illuminate\Support\Collection;

class QuoteService implements QuoteServiceInterface {

    /**
     * Get five random quotes from an external API
     * the external api url is https://dummyjson.com/quotes/random
     *
     * @return object
     */
    public function getRandomQuotes(): array {
        $client = new Client();
        $promises = [];

        // Realizar 5 llamadas asincrónicas
        for ($i = 0; $i < 5; $i++) {
            $promises[] = $client->getAsync('https://dummyjson.com/quotes/random');
        }

        // Esperar a que todas las promesas se resuelvan
        $results = Promise\Utils::settle($promises)->wait();

        // Almacenar los resultados
        $quotes = [];

        // Obtener los resultados de las promesas
        foreach ($results as $result) {
            if ($result['state'] === 'fulfilled' && $result['value']->getStatusCode() === 200) {
                $quotes[] = json_decode($result['value']->getBody()->getContents());
            }
        }

        return array_filter($quotes, function ($quote) {
            return $quote !== null;
        });
    }

    /**
     * Get a random quote from an external API
     * the external api url is https://dummyjson.com/quotes/random
     *
     * @return object
     */
    public function getRandomQuote(): object {
        $client = new Client();
        $response = $client->get('https://dummyjson.com/quotes/random');

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get a quotes from an external API by id's
     *
     * @return array
     */
    public function getQuotesByIds(Collection $ids): array {
        $client = new Client();
        $promises = [];

        // Realizar 5 llamadas asincrónicas
        foreach ($ids as $id) {
            $promises[] = $client->getAsync('https://dummyjson.com/quotes/' . $id);
        }

        // Esperar a que todas las promesas se resuelvan
        $results = Promise\Utils::settle($promises)->wait();

        // Almacenar los resultados
        $quotes = [];

        // Obtener los resultados de las promesas
        foreach ($results as $result) {
            if ($result['state'] === 'fulfilled' && $result['value']->getStatusCode() === 200) {
                $quotes[] = json_decode($result['value']->getBody()->getContents());
            }
        }

        return array_filter($quotes, function ($quote) {
            return $quote !== null;
        });
    }


    /**
     * Get a quote from an external API by id
     * the external api url is https://dummyjson.com/quotes/{id}
     *
     * @return object
     */
    public function getQuoteById(int $id): object {
        if( $id < 1 ) {
            throw new ValidationException('The id must be greater than 0');
        }

        if( $id === null ) {
            throw new ValidationException('The id is required');
        }

        $client = new Client();
        $response = $client->get('https://dummyjson.com/quotes/' . $id);

        return json_decode($response->getBody()->getContents());
    }
}
