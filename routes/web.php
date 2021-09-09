<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome', [
        'products' => Product::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'products' => Product::query()->where('user_id', '=', Auth::user()->id)->get()
    ]);
})->middleware(['auth'])->name('dashboard');

Route::resource('/products', ProductController::class)->middleware(['auth']);
Route::get('/products/{product}', [ProductController::class, 'show']);

require __DIR__.'/auth.php';
