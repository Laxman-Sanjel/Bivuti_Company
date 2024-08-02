<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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
//For Companies
Route::get('/companiesform', [CompaniesController::class, 'index'])->name('companiesform');
Route::POST('/store_form', [CompaniesController::class, 'store'])->name('store_form');
Route::get('/delete_data/{id}', [CompaniesController::class, 'Delete'])->name('delete_data');
Route::get('Edit/{id}', [CompaniesController::class, 'Edit'])->name('Edit');
Route::put('/Update/{id}', [CompaniesController::class, 'Update'])->name('Update');

//For Employees
Route::get('/View_Form', [EmployeesController::class, 'Index'])->name('View_Form');
Route::POST('/Insert_Form', [EmployeesController::class, 'Store'])->name('Insert_Form');
Route::get('/delete_emp/{id}', [EmployeesController::class, 'Delete_Data'])->name('delete_emp');
Route::get('Edit_Emp/{id}', [EmployeesController::class, 'Edit'])->name('Edit_Emp');
Route::put('/Update_Data/{id}', [EmployeesController::class, 'Update'])->name('Update_Data');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
