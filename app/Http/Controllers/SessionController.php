<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function attempt()
    {
        $url = 'https://demodb.my.erp.net/api/domain/Login';

        $data = [
            'app' => 'demoapp',
            'user' => 'Admin',
            'pass' => '123',
            'lang' => 'bg',
        ];

        $response = Http::post($url, $data)->json();

        if (isset($response['authorization'])) {
            return redirect()->route('main.page', [
                'Authorization' => $response['authorization'],
            ]);
        }

        return redirect()->route('login.page');
    }

    public function destroy(Request $request)
    {
        $url = 'https://demodb.my.erp.net/api/domain/Logout';

        $response = Http::withHeaders([
            'Authorization' => $request->input('Authorization')
        ])->post($url);

        return redirect()->route('login.page');
    }
}
