<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
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
   
});
Route::resource('employees', EmployeeController::class);
// Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

