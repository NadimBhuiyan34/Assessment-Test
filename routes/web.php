<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use App\Http\Controllers\BookController;
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
    $employees=Employee::latest()->get();
        return view('AssessmentForm',compact('employees'));
   
})->name('home');
Route::resource('employees', EmployeeController::class);
Route::patch('/employees/{id}', [EmployeeController::class, 'data'])->name('employees.data');
Route::resource('books', BookController::class);
