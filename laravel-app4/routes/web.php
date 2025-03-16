<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

// Route::get('/', function () {
//     //return view('welcome');
//     return view('home');
// });
// Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->middleware(EnsureTokenIsValid::class);; 
// Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index']); 
// Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
// Route::get('/profile/detail/{id}', [\App\Http\Controllers\ProfileController::class, 'detail']); 
// Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->withoutMiddleware(EnsureTokenIsValid::class); 
// Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store']);// 新增这个路由

// // 登录页面路由
// Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->withoutMiddleware(EnsureTokenIsValid::class); 
// Route::get('/login/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
// // 登录处理路由
// Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);

// Route::resource('blog', \App\Http\Controllers\BlogController::class);

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']); 
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index']); 
    Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
    Route::get('/profile/detail/{id}', [\App\Http\Controllers\ProfileController::class, 'detail']); 
    Route::get('/login/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
    Route::resource('blog', \App\Http\Controllers\BlogController::class);

});

Route::withoutMiddleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index']); 
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store']);// 新增这个路由
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index']);
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);
});


Route::get('/tasks', [\App\Http\Controllers\TasksController::class, 'index'])->name("tasks.index"); 
Route::get('/tasks/create', [\App\Http\Controllers\TasksController::class, 'create'])->name("tasks.create"); 
Route::get('/tasks/{task}/edit', [\App\Http\Controllers\TasksController::class, 'edit'])->name("tasks.edit"); 
Route::get('/tasks/{task}', [\App\Http\Controllers\TasksController::class, 'show'])->name("tasks.show"); 
Route::post('/tasks', [\App\Http\Controllers\TasksController::class,'store'])->name("tasks.store"); 
Route::put('/tasks', [\App\Http\Controllers\TasksController::class,'store'])->name("tasks.update"); 
Route::put('/tasks/{task}/toggleComplete', [\App\Http\Controllers\TasksController::class,'toggleComplete'])->name("tasks.toggle-complete"); 
Route::delete('/tasks/{task}', [\App\Http\Controllers\TasksController::class,'delete'])->name("tasks.delete"); 