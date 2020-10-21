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
    return view('welcome');
});


Route::get('/categories', function () {
    return \App\Models\Category::all();
});

Route::get('/products/{categoryId}', function ($categoryId) {
    return \App\Models\Product::where('categoryId', $categoryId)->get(['id', 'categoryId', 'name', 'code', 'protein', 'fat', 'carbohydrate', 'calories', 'image']);
});

Route::get('/product/{id}',function ($id) {
    return \App\Models\Product::where('id', $id)->first();
});
