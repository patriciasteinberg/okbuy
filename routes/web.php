<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/categories/{category}', function($category){
    $categories = [
        'kitchen' => 'Kitchen products',
        'beauty' => 'Beauty products.'
    ];

    if (! array_key_exists($category, $categories)) {
        abort(404, 'Sorry, that post was not found.');
    }

    return view('category', [
        'category' => $categories[$category]
    ]);
});

Route::get('/products/{product}', function($product){
    $products = [
        'stove' => 'All the stoves',
        'cream' => 'All the creams'
    ];

    if (! array_key_exists($product, $products)) {
        abort(404, 'Sorry, that post was not found.');
    }

    return view('product', [
        'product' => $products[$product]
    ]);
});

Route::get('/cart/{orderId}', function($orderId){
    $orderIds = [
        '1234' => 'Only a stove.',
        '5678' => 'Only one cream',
        '9123' => 'A stove and a cream'
    ];

    if (! array_key_exists($orderId, $orderIds)) {
        abort(404, 'Sorry, that post was not found.');
    }

    return view('cart', [
        'orderId' => $orderIds[$orderId]
    ]);
});
