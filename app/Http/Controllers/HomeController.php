<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $url = 'https://demodb.my.erp.net/api/domain/odata/Crm_Sales_SalesOrders';

        $query = '?$top=1&$filter=Id%20eq%2070c5792a-9d51-4c67-b90b-96ba79c0c9b1&$select=DocumentDate,DocumentNo';

        $response = Http::withHeaders([
            'Authorization' => $request->input('Authorization'),
        ])->get($url . $query)->json();

        $documentNo = '';
        $documentDate = '';

        if (isset($response['value'])) {
            $documentNo = $response['value'][0]['DocumentNo'];

            $documentDate = $response['value'][0]['DocumentDate'];
        }

        return view('home', [
            'documentNo' => $documentNo,
            'documentDate' => $documentDate,
        ]);
    }
}
