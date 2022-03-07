<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $url = route('get.sale');

        $response = Http::withHeaders([
            'Authorization' => $request->input('Authorization'),
        ])->get($url)->json();

        return view('home', [
            'documentNo' => $response['DocumentNo'],
            'documentDate' => $response['DocumentDate'],
        ]);
    }
}
