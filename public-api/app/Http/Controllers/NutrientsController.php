<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NutrientsController extends Controller
{
    private $privateApiUrl;

    public function __construct()
    {
        $this->privateApiUrl = env('PRIVATE_API_URL');
    }

    public function show(int $id)
    {
        $response = Http::get("{$this->privateApiUrl}/nutrientsDetails/{$id}");
        return $response->json();
    }


}
