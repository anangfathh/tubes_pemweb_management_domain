<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Domain\DomainController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/domains', [DomainController::class, 'index'])->name('administrator.domain.index');
    Route::get('/domains/create', [DomainController::class, 'create'])->name('administrator.domain.create');
    Route::get('/domains/{id}', [DomainController::class, 'show'])->name('administrator.domain.show');
    Route::post('/domains', [DomainController::class, 'store'])->name('administrator.domain.store');
    Route::get('/domains/{domain}/edit', [DomainController::class, 'edit'])->name('administrator.domain.edit');
    Route::put('/domains/{domain}', [DomainController::class, 'update'])->name('administrator.domain.update');
    Route::delete('/domains/{domain}', [DomainController::class, 'destroy'])->name('administrator.domain.destroy');
    Route::delete('/domains/images/{domainImage}', [DomainController::class, 'destroyImage'])->name('administrator.domain.destroyImage');
    Route::post('administrator/domain/{id}/upload-image', [DomainController::class, 'uploadImage'])->name('administrator.domain.uploadImage');
});
