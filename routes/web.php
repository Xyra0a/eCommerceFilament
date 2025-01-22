<?php

use App\Livewire\Auth\ForgotPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckOutPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\MyOrderPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductPage::class);
Route::get('/products/{product}', ProductDetailPage::class);
Route::get('/cart', CartPage::class);
Route::get('/checkout', CheckOutPage::class);
Route::get('/my-orders', MyOrderPage::class);
Route::get('/my-orders/{order}', MyOrderDetailPage::class);

// Auth
Route::get('/login', LoginPage::class);
Route::get('/register', RegisterPage::class);
Route::get('/forgot', ForgotPage::class);
Route::get('/reset', ResetPage::class);

Route::get('/success', SuccessPage::class);
Route::get('/cancel', CancelPage::class);
