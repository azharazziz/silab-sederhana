<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //with authentication
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['middleware' => ['role:super-admin']], function () {
        //super-admin
        Route::get('/clinician', App\Http\Livewire\Clinician\Index::class)->name('clinician');
        Route::get('/room', App\Http\Livewire\Room\Index::class)->name('room');
        Route::get('/parameter/list', App\Http\Livewire\Parameter\Index::class)->name('parameter');
        Route::get('parameter/category',  App\Http\Livewire\Parameter\Category::class)->name('category');
        Route::get('user',  App\Http\Livewire\User\Index::class)->name('user');
    });

    Route::group(['middleware' => ['role:laboratorium']], function () {
        //laboratorium
        route::get('/patient/register', App\Http\Livewire\Patient\Index::class)->name('patient.register');
        route::get('/sample', \App\Http\Livewire\Sample\Index::class)->name('sample');
        route::get('/barcode/{orderId}', \App\Http\Livewire\Print\Barcode::class)->name('barcode');
        route::get('/analyze', \App\Http\Livewire\Analyze\Index::class)->name('analyze');
        route::get('/validate', \App\Http\Livewire\Validate\Index::class)->name('validate');
        route::get('/checkout', \App\Http\Livewire\Checkout\Index::class)->name('checkout');
        route::get('/search', \App\Http\Livewire\Search\Index::class)->name('search');
        route::get('/billing', \App\Http\Livewire\Billing\Index::class)->name('billing');
        route::get('billing/invoice/{orderId}', \App\Http\Livewire\Invoice\Index::class)->name('invoice');
    });
    Route::group(['middleware' => ['role:administration']], function () {
        //administration
        route::get('/handover', \App\Http\Livewire\Handover\Index::class)->name('handover');
        route::get('/critical', \App\Http\Livewire\Critical\Index::class)->name('critical');
        route::get('/consumable', \App\Http\Livewire\Consumable\Index::class)->name('consumable');

    });
});
    route::get('/print/{orderId}', \App\Http\Livewire\Print\Index::class)->name('print');

require __DIR__.'/auth.php';
