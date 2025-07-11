<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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


// Theme routes
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/catogory/{id}', 'catogory')->name('catogory');
    Route::get('/contact', 'contact')->name('contact');
});

// Subscriber routes
Route::post('subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');

// Contact routes
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');

// Blog routes
Route::resource('blogs', BlogController::class);

// Comment routes
Route::post('comment/store', [CommentController::class, 'store'])->name('comment.store');


require __DIR__.'/auth.php';
