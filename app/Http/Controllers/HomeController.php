<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $url = 'https://demodb.my.erp.net/api/domain/odata/Crm_Sales_SalesOrders';

        $query = '?$top=10&$filter=Id%20eq%2070c5792a-9d51-4c67-b90b-96ba79c0c9b1&$select=DocumentDate,DocumentNo HTTP/1.1';

        $response = Http::withHeaders([
            'Authorization' => $request->input('Authorization'),
        ])->get($url . $query)->json();

        // dd($response);

        return view('home');
    }
}
