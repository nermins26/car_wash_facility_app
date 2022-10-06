<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WashingProgramController;
use App\Http\Controllers\WashingStepController;
use App\Models\WashingProgram;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
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
    $washingPrograms = WashingProgram::all();
    return view('index', compact('washingPrograms'));
})->name('home');

Route::get('/readme', function() {
    return view('layouts.readme');
})->name('readme');


Route::middleware(['auth', 'HasRole:administrator'])->prefix('users')->name('users.')->group(function () {

    Route::get('/show', [UserController::class, 'showUsers'])->name('show');

    Route::get('/create', [UserController::class, 'showCreateUsers'])->name('show.create');

    Route::get('/edit/{id}', [UserController::class, 'showEditUsers'])->name('show.edit');

    Route::post('/create', [UserController::class, 'createUsers'])->name('create');

    Route::put('/edit/{id}', [UserController::class, 'editUsers'])->name('edit');

    Route::delete('/delete/{id}', [UserController::class, 'deleteUser'])->name('delete');

    Route::put('/password-update/{id}', [UserController::class, 'updatePassword'])->name('update.password')->withoutMiddleware(['HasRole:administrator']);
});


Route::middleware('auth')->get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard.show');


Route::middleware(['auth', 'HasRole:client'])->prefix('profiles')->name('profiles.')->group(function() {

    Route::get('/create', [ProfileController::class, 'showCreateProfiles'])->name('show.create');

    Route::post('/create', [ProfileController::class, 'createProfiles'])->name('create');

    Route::put('/edit/{id}', [ProfileController::class, 'editProfiles'])->name('edit');

    Route::delete('/delete/{id}', [ProfileController::class, 'deleteProgram'])->name('delete');
});


Route::middleware(['auth', 'HasRole:client'])->prefix('cars')->name('cars.')->group(function() {

    Route::middleware('HasProfile')->get('/create', [CarController::class, 'showCreateCars'])->name('show.create');

    Route::get('/edit/{id}', [CarController::class, 'showEditCars'])->name('show.edit');

    Route::post('/create', [CarController::class, 'createCars'])->name('create');

    Route::put('/edit/{id}', [CarController::class, 'editCars'])->name('edit');

    Route::delete('/delete/{id}', [CarController::class, 'deleteCar'])->name('delete');
});


Route::middleware(['auth', 'HasRole:administrator'])->prefix('programs')->name('programs.')->group(function() {

    Route::get('/create', [WashingProgramController::class, 'showCreatePrograms'])->name('show.create');

    Route::get('/edit/{id}', [WashingProgramController::class, 'showEditPrograms'])->name('show.edit');

    Route::post('/create', [WashingProgramController::class, 'createPrograms'])->name('create');

    Route::put('/edit/{id}', [WashingProgramController::class, 'editPrograms'])->name('edit');

    Route::delete('/delete/{id}', [WashingProgramController::class, 'deleteProgram'])->name('delete');
});


Route::middleware(['auth', 'HasRole:administrator'])->prefix('steps')->name('steps.')->group(function() {

    Route::get('/create', [WashingStepController::class, 'showCreateSteps'])->name('show.create');

    Route::get('/edit/{id}', [WashingStepController::class, 'showEditSteps'])->name('show.edit');

    Route::post('/create', [WashingStepController::class, 'createSteps'])->name('create');

    Route::put('/edit/{id}', [WashingStepController::class, 'editSteps'])->name('edit');

    Route::delete('/delete/{id}', [WashingStepController::class, 'deleteStep'])->name('delete');
});


Route::middleware('auth')->prefix('orders')->name('orders.')->group(function() {
    Route::middleware('HasRole:client')->group(function(){

        Route::middleware(['HasProfile', 'HasCar'])->get('/create/{program}', [OrderController::class, 'showCreateOrders'])->name('show.create');

        Route::middleware(['HasProfile', 'HasCar'])->get('/new', [OrderController::class, 'previewOrder'])->name('show.new');

        Route::post('/create', [OrderController::class, 'createOrders'])->name('create');
    });
    
    Route::middleware(['HasRole:administrator,worker'])->group(function(){
        Route::get('/edit/{id}', [OrderController::class, 'showEditOrders'])->name('show.edit');

        Route::put('/edit/{id}', [OrderController::class, 'editOrders'])->name('edit');
    });
    

    Route::delete('/delete/{id}', [OrderController::class, 'deleteOrder'])->name('delete');
});



