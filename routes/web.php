<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware(['auth'])->group(function () {
    // All users
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    Route::get('/dashboard', function () {
        return redirect()->route('employees.index');
    })->middleware(['auth'])->name('dashboard');

    // Only admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return redirect()->route('employees.index');
//     })->name('dashboard');

//     Route::resource('employees', EmployeeController::class);
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
