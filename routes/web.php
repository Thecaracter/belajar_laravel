<?php
use App\Http\Controllers\MahasiswaController;
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

// Route::get('/', function () {
//     return view('mahasiswa.index');
// });

// Route::get('/mahasiswa', MahasiswaController);
Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::post('/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');