<?php

use App\Http\Livewire\admin\DiseasesIndex;
use App\Http\Livewire\admin\RolesIndex;

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
    return view('index');
});
Route::middleware('can:admin')->group(function () {
    Route::get('/dashboard/roles', [RolesIndex::class, 'index'])->name('roles');
    Route::get('/dashboard/diseases', [DiseasesIndex::class, 'index'])->name('diseases');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
