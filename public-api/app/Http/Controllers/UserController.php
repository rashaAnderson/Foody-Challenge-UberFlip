<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $privateApiUrl;

    public function __construct()
    {
        $this->privateApiUrl = env('PRIVATE_API_URL');
        $this->errorMesage = 'Internal Error, please try again later';
        $this->genericErrorStatusCode = 500;
    }

    public function index(Request $request)
    {
        $limit = $request->get('limit');
        $page = $request->get('page');

        $response = Http::get("{$this->privateApiUrl}/users", [
            'query' => [
                'page' => $page,
                'limit' => $limit,
            ]
        ]);
         if ($response->ok()) {
            return $response->json();
        } else {
            return response($this->errorMesage, $this->genericErrorStatusCode);
        }
    }

    public function show(int $userId)
    {
        $response = Http::get("{$this->privateApiUrl}/users/{$userId}");
         if ($response->ok()) {
            return $response->json();
        } else {
            return response($this->errorMesage, $this->genericErrorStatusCode);
        }
    }
}
