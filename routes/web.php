<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Client;

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





Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post("/", [ClientController::class, "store"]);
    Route::get("/qr", [ClientController::class, "qr"]);
    Route::get("/surprise-wheel", [ClientController::class, "surprise_wheel"]);


    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            $clients = Client::all();
            return view('dashboard', compact('clients'));
        })->name('dashboard');
    });



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
