<?php

use App\Http\Controllers\Locations\ClinicController;
use App\Http\Controllers\Locations\LocationRequestsController;
use App\Http\Controllers\Locations\PharmacyController;
use App\Http\Livewire\admin\DiseasesIndex;
use App\Http\Livewire\admin\jobs\JobsRequests;
use App\Http\Livewire\admin\LocationsIndex;
use App\Http\Livewire\admin\MedicinesIndex;
use App\Http\Livewire\admin\RolesIndex;
use App\Http\Livewire\doctors\DoctorsCreate;
use App\Http\Livewire\jobs\JobsIndex;
use App\Http\Livewire\pharmacists\PharmacistsCreate;
use App\Http\Livewire\pharmacists\PharmacyIndex;

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
    Route::get('/dashboard/medicines', [MedicinesIndex::class, 'index'])->name('medicines');
    Route::get('/dashboard/jobRequests', [JobsRequests::class, 'index'])->name('job-requests');
    Route::get('/dashboard/locations', [LocationsIndex::class, 'index'])->name('location-requests');
});
Route::middleware('can:patient')->group(function () {
    Route::get('/dashboard/doctors/register', [DoctorsCreate::class, 'index'])->name('doctors-register');
    Route::get('/dashboard/pharmacists/register', [PharmacistsCreate::class, 'index'])->name('pharmacists-register');
    Route::get('/dashboard/jobs/index', [JobsIndex::class, 'index'])->name('jobs-index');
});
Route::middleware('can:both')->group(function () {
    Route::get('/dashboard/locations/preview', LocationRequestsController::class)->name('locations-request-preview');
});
Route::middleware('can:doctor')->group(function () {
    Route::get('/dashboard/clinics/register', [ClinicController::class, 'index'])->name('clinics-register');
    Route::post('/dashboard/clinics', [ClinicController::class, 'store']);
});
Route::middleware('can:pharmacist')->group(function () {
    Route::get('/dashboard/pharmacies/register', [PharmacyController::class, 'index'])->name('pharmacies-register');
    Route::get('/dashboard/pharmacy/index', [PharmacyIndex::class, 'index'])->name('pharmacy-index');
    Route::post('/dashboard/pharmacies', [PharmacyController::class, 'store']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
