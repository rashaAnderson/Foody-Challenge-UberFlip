<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodNutrientController extends Controller
{
    private $privateApiUrl;

    public function __construct()
    {
        $this->privateApiUrl = env('PRIVATE_API_URL');
    }

    public function show(int $foodId)
    {
        $response = Http::get("{$this->privateApiUrl}/foodNutrients/{$foodId}");
        return $response->json();
    }

    
    public function index(Request $request)
    {
        $limit = $request->get('limit');
        $page = $request->get('page');

        $response = Http::get("{$this->privateApiUrl}/foodNutrients", [
            'query' => [
                'page' => $page,
                'limit' => $limit,
            ]
        ]);
        return $response->json();
    }

    
}
