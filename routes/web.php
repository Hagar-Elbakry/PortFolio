<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\get;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/resume', [ResumeController::class, 'index'])->name('resume');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route:get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
