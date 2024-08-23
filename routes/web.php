<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', [JobController::class, 'index'])->name('jobs.index');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/apply/{jobId}', [ApplicationController::class, 'create'])->name('applications.create');

Route::post('/apply', [ApplicationController::class, 'store'])->name('applications.store');

Route::get('/application/success', function () {
    return '応募が完了しました。';
})->name('application.success');

Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/applications', [ApplicationController::class, 'index'])->name('application.index');

Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::view('/admin/add-company', 'admin.add-company');
Route::post('/admin/add-company', [CompanyController::class, 'store'])->name('admin.company.store');





Route::get('/admin/add-job', [ProjectController::class, 'create'])->name('admin.project.create');

Route::post('/admin/add-job', [ProjectController::class, 'store'])->name('admin.project.store');

Route::get('/admin/confirm-company', [CompanyController::class, 'index'])->name('admin.confirm-company');
Route::get('/admin/company/{id}', [CompanyController::class, 'show'])->name('admin.company.show');

Route::get('/admin/company/{id}/projects', [CompanyController::class, 'showProjects'])->name('admin.company.projects');
Route::get('/admin/project/{id}', [ProjectController::class, 'show'])->name('admin.project.show');


Route::get('/admin/application/{id}', [ApplicationController::class, 'show'])->name('admin.application.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');


});



require __DIR__.'/auth.php';

