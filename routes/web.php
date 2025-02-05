<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['prefix' => 'article/', 'as' => 'article.'], function () {
    Route::get('', [ArticleController::class, 'index'])->name('article');

    Route::get('{id}', [ArticleController::class, 'show'])->name('view');
    Route::post('search', [ArticleController::class, 'search'])->name('search');
});


// USER ROUTE AND THE MAIL VERIFICATION

Route::get('register', [UserController::class, 'registerPage'])->name('register');

Route::post('register', [UserController::class, 'register']);

Route::get('/email/verify', function () {
    return view('mail.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('login', [UserController::class, 'loginPage'])->name('login');

Route::post('login', [UserController::class, 'login']);

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('profile', [UserController::class, 'profile'])
    ->name('profile')
    ->middleware(["auth", "verified"]);

Route::get('profile/basket', [UserController::class, 'basket'])
    ->name('basket.show')
    ->middleware('auth');



// GOOGLE OAUTH
Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name("redirect");
Route::get('auth/google/callback', [UserController::class, 'googleCallback']);


Route::group(
    [
        'prefix' => 'admin/',
        'as' => 'admin.',
        'middleware' => ['auth', 'admin'],
    ],
    function () {
        Route::get('', [AdminController::class, 'index'])->name('dashboard');
        Route::get('article', [AdminController::class, 'showArticle'])->name('article');
        Route::get('article/category', [AdminController::class, 'categoryArticle'])->name('category');
        Route::get('article/add', [AdminController::class, 'create'])->name('add');
        Route::post('article/add', [AdminController::class, 'store']);
        Route::get('article/edit/{article}', [AdminController::class, 'edit'])->name('edit');
        Route::put('article/edit/{article}', [AdminController::class, 'update']);
        Route::delete('article/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
    },
);

Route::post('basket/add/article-{article}', [BasketController::class, 'addToBasket'])
    ->name('basket.add')
    ->middleware('auth');
Route::delete('basket/delete/article-{basket}', [BasketController::class, 'delete'])
    ->name('basket.delete')
    ->middleware('auth');
