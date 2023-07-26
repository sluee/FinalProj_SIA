<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('/products/pdf',[PdfController::class,'productsSummary']);
Route::get('/products/pdf/{product}',[PdfController::class,'prodSummary']);


Route::get('/products/email/{product}', [ProductController::class, 'email']);
Route::resource('products', ProductController::class);
Route::get('/products/search/{searchKey}', [ProductController::class, 'search']);
Route::get('/products/edit/{product}',[ProductController::class,'edit']);
Route::post('/products/toggle/{product}',[ProductController ::class, 'toggle']);

Route::resource('suppliers', SupplierController::class);
Route::get('/suppliers/search/{searchKey}', [SupplierController::class, 'search']);

Route::resource('admin', AdminController::class);
Route::post('/admin/send-email', [AdminController::class, 'bulkEmail']);


