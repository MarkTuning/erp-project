<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getSale', function (Request $request) {
    $url = 'https://demodb.my.erp.net/api/domain/odata/Crm_Sales_SalesOrders';

    $query = '?$top=1&$filter=Id%20eq%2070c5792a-9d51-4c67-b90b-96ba79c0c9b1&$select=DocumentDate,DocumentNo';

    $response = Http::withHeaders([
        'Authorization' => $request->header('Authorization'),
    ])->get($url . $query)->json();

    $data = [];

    if (isset($response['value'])) {
        $data['DocumentNo'] = $response['value'][0]['DocumentNo'];

        $data['DocumentDate'] = $response['value'][0]['DocumentDate'];
    }
    else {
        $data['error'] = 'An error occured when trying to get the information.';
    }

    return json_encode($data);
})->name('get.sale');
