<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;

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
// Route::get('user/dashboard', [FormController::class, 'ShowUserlist']);
// Route::post('/logout', 'logout')->name('logout');
// Route::get('/add-student', [StudentController::class, 'create']);
// Route::post('/addStudentCourseDetail', [StudentController::class, 'store']);

// @if(session()->has('id'))
// Route::get('user/students', [StudentController::class, 'showDetail']);
// @else
// Route::get('user/login', function () {
//     return view('login');
// });

// Route::get('edit-student/{id}', [StudentController::class, 'edit']);

// Route::put('update-student/{id}', [StudentController::class, 'update']);

// Route::get('delete-student/{id}', [StudentController::class, 'destroy']);


// Route::controller(StudentController::class)->group(function () {
    //     Route::get('/add-student','create');
    //     Route::post('/add-student','store');
    //     Route::get('/edit-student/{id}', 'edit');
    //     Route::put('/update-student/{id}','update');
    //     Route::get('/delete-student/{id}','destroy');
    //     Route::get('/user/students','showDetail');
    // });

Route::get('/', function () {
    return view('register');
})->name('userregister');

Route::get('user/welcome', function () {
    return view('welcome');
});

Route::post('/user/create', [ FormController::class, 'store' ]);

Route::get('user/login', function () {
    return view('login');
});

Route::post('/authenticate',[FormController::class, 'loginUser']);
Route::get('logout', [FormController::class, 'logout'])->name('logout');

    
// Route::middleware(['userAuth'])->group(function () {
    Route::get('/add-student', [StudentController::class, 'create'])->name('student.create');
    Route::post('/add-student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/edit-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/update-student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/user/students', [StudentController::class, 'showDetail'])->name('student.showDetail');


    Route::get('/add-employee', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/add-employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/update-employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/delete-employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('/user/employee', [EmployeeController::class, 'showDetail'])->name('employee.showDetail');
// });
// Route::middleware(['guest'])->group(function () {
//     Route::get('/user/login', function () {
//         return view('login');
//     })->name('login');
// });
