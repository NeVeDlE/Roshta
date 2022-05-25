<?php

use App\Http\Controllers\Doctor\ExaminePatientController;
use App\Http\Controllers\Location\ClinicController;
use App\Http\Controllers\Location\ClinicManagementController;
use App\Http\Controllers\Location\LocationController;
use App\Http\Controllers\Location\LocationRequestsController;
use App\Http\Controllers\Location\PharmacyController;
use App\Http\Controllers\Medicine\MedicineController;
use App\Http\Controllers\Patient\ExaminationController;
use App\Http\Controllers\Patient\QRController;
use App\Http\Livewire\admin\DiseasesIndex;
use App\Http\Livewire\admin\jobs\JobsRequests;
use App\Http\Livewire\admin\LocationsIndex;
use App\Http\Livewire\admin\MedicinesIndex;
use App\Http\Livewire\admin\RolesIndex;
use App\Http\Livewire\doctors\ClinicExaminationRequests;
use App\Http\Livewire\doctors\DoctorsCreate;
use App\Http\Livewire\jobs\JobsIndex;
use App\Http\Livewire\patient\PatientExaminationRequests;
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
    Route::get('/dashboard/Medicine', [MedicinesIndex::class, 'index'])->name('Medicine');
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
    Route::get('/dashboard/clinics/index', [ClinicExaminationRequests::class, 'index'])->name('clinic-management');
    Route::post('/dashboard/clinics', [ClinicController::class, 'store']);
    Route::get('/dashboard/clinics/{location:id}/examine', [ExaminePatientController::class, 'index']);
    Route::get('/dashboard/clinics/{location:id}/examine/{user}', [ExaminePatientController::class, 'show']);
    Route::post('/dashboard/clinics/{location:id}/examine/{user}', [ExaminePatientController::class, 'store']);
});
Route::middleware('can:pharmacist')->group(function () {
    Route::get('/dashboard/pharmacies/register', [PharmacyController::class, 'index'])->name('pharmacies-register');
    Route::get('/dashboard/pharmacy/index', [PharmacyIndex::class, 'index'])->name('pharmacy-index');
    Route::post('/dashboard/pharmacies', [PharmacyController::class, 'store']);
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/QR', QRController::class);
    Route::get('/dashboard/examinationRequests', [PatientExaminationRequests::class, 'index'])->name('examination-requests');
    Route::get('/dashboard/medicines/{medicine:id}/{lat}/{lng}', MedicineController::class);
    Route::get('/dashboard/locations/{location:id}/{lat}/{lng}', LocationController::class);
    Route::post('/dashboard/clinics/{location:id}/reserve', [ClinicManagementController::class, 'store']);
    Route::get('/dashboard/examinations', [ExaminationController::class, 'index']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
