<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WashingProgramController;
use App\Models\WashingProgram;
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

Route::middleware('auth')->prefix('users')->name('users.')->group(function () {
    Route::get('/show', [UserController::class, 'showUsers'])->name('show');
    Route::get('/create', [UserController::class, 'showCreateUsers'])->name('show.create');
    Route::get('/edit/{id}', [UserController::class, 'showEditUsers'])->name('show.edit');
    Route::post('/create', [UserController::class, 'createUsers'])->name('create');
    Route::put('/edit/{id}', [UserController::class, 'editUsers'])->name('edit');
    Route::delete('/delete/{id}', [UserController::class, 'deleteUser'])->name('delete');
    Route::put('/password-update/{id}', [UserController::class, 'updatePassword'])->name('update.password');
});

Route::middleware('auth')->get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard.show');

Route::prefix('profiles')->name('profiles.')->group(function() {
    Route::get('/show', [ProfileController::class, 'showProfiles'])->name('show');
    Route::get('/create', [ProfileController::class, 'showCreateProfiles'])->name('show.create');
    Route::get('/edit/{id}', [ProfileController::class, 'showEditProfiles'])->name('show.edit');
    Route::post('/create', [ProfileController::class, 'createProfiles'])->name('create');
    Route::put('/edit/{id}', [ProfileController::class, 'editProfiles'])->name('edit');
    Route::delete('/delete/{id}', [ProfileController::class, 'deleteProgram'])->name('delete');
});

Route::prefix('cars')->name('cars.')->group(function() {
    Route::get('/show', [CarController::class, 'showCars'])->name('show');
    Route::get('/create', [CarController::class, 'showCreateCars'])->name('show.create');
    Route::get('/edit/{id}', [CarController::class, 'showEditCars'])->name('show.edit');
    Route::post('/create', [CarController::class, 'createCars'])->name('create');
    Route::put('/edit/{id}', [CarController::class, 'editCars'])->name('edit');
    Route::delete('/delete/{id}', [CarController::class, 'deleteCar'])->name('delete');
});

Route::prefix('programs')->name('programs.')->group(function() {
    Route::get('/show', [WashingProgramController::class, 'showPrograms'])->name('show');
    Route::get('/create', [WashingProgramController::class, 'showCreatePrograms'])->name('show.create');
    Route::get('/edit/{id}', [WashingProgramController::class, 'showEditPrograms'])->name('show.edit');
    Route::post('/create', [WashingProgramController::class, 'createPrograms'])->name('create');
    Route::put('/edit/{id}', [WashingProgramController::class, 'editPrograms'])->name('edit');
    Route::delete('/delete/{id}', [WashingProgramController::class, 'deleteProgram'])->name('delete');
});

Route::prefix('steps')->name('steps.')->group(function() {
    Route::get('/show', [WashingStepController::class, 'showSteps'])->name('show');
    Route::get('/create', [WashingStepController::class, 'showCreateSteps'])->name('show.create');
    Route::get('/edit/{id}', [WashingStepController::class, 'showEditSteps'])->name('show.edit');
    Route::post('/create', [WashingStepController::class, 'createSteps'])->name('create');
    Route::put('/edit/{id}', [WashingStepController::class, 'editSteps'])->name('edit');
    Route::delete('/delete/{id}', [WashingStepController::class, 'deleteStep'])->name('delete');
});



