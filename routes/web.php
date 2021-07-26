<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

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

Route::get('employee', [EmployeesController::class, 'index'])->name('employee.view');

Route::get('add-employee', [EmployeesController::class, 'create'])->name('employee.create');

Route::post('add-employee', [EmployeesController::class, 'store'])->name('employee.store');

Route::post('list-employee', [EmployeesController::class, 'listEmployees'])->name('employee.list');

Route::get('edit-employee/{id}', [EmployeesController::class, 'edit'])->name('employee.edit');

Route::post('update-employee/{id}', [EmployeesController::class, 'update'])->name('employee.update');

Route::get('delet-employee/{id}', [EmployeesController::class, 'destroy'])->name('employee.delete');

