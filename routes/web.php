<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentManagementController;

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

Route::get('student', [StudentManagementController::class, 'index'])->name('student.view');

Route::get('add-student', [StudentManagementController::class, 'create'])->name('student.create');

Route::post('add-student', [StudentManagementController::class, 'store'])->name('student.store');

Route::get('edit-student/{id}', [StudentManagementController::class, 'edit'])->name('student.edit');

Route::post('update-student/{id}', [StudentManagementController::class, 'update'])->name('student.update');

Route::get('delet-student/{id}', [StudentManagementController::class, 'destroy'])->name('student.delete');

Route::get('add-marks', [StudentManagementController::class, 'addMarks'])->name('marks.create');

Route::post('add-marks', [StudentManagementController::class, 'storeMarks'])->name('marks.store');

Route::get('list-marks', [StudentManagementController::class, 'listMarks'])->name('marks.list');

Route::get('edit-mark/{id}', [StudentManagementController::class, 'editMark'])->name('mark.edit');

Route::post('update-mark/{id}', [StudentManagementController::class, 'updateMark'])->name('mark.update');

Route::get('delet-mark/{id}', [StudentManagementController::class, 'markDelete'])->name('mark.delete');