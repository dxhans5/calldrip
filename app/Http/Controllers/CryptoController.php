<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * CryptoController class responsible for handling cryptocurrency-related operations.
 */
class CryptoController extends Controller
{
    /**
     * The variable $api_url stores the URL of the WorldCoinIndex API service.
     * This API provides access to various cryptocurrency-related data.
     *
     * @var string $api_url The URL of the WorldCoinIndex API service.
     */
    private string $api_url = 'https://www.worldcoinindex.com/apiservice/';

    private string $push_api_url = 'https://viruscryptoindex.free.beeceptor.com/push';

    /**
     * Retrieves the ticker information from the API and returns the view with the ticker data.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application The view with the ticker data.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $ticker = Http::get($this->api_url . 'ticker?key=' . env('API_KEY') . '&label=ethbtc-ltcbtc&fiat=btc')->json();

        return view('crypto.index', [
            'ticker' => $ticker,
        ]);
    }

    /**
     * Pushes the provided payload to the API using a POST request.
     *
     * @param Request $request The HTTP request containing the payload to be pushed.
     * @return JsonResponse A JSON response indicating the success of the API call.
     */
    public function push_to_api(Request $request): JsonResponse
    {
        $payload = $request->get('payload');

        $response = Http::post($this->push_api_url, ['payload' => $payload]);

        return response()->json(['success' => $response['status']]);
    }
}
