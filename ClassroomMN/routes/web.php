<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ScheduleController;

Route::get('/', [ClassroomController::class, 'index'])->name('classrooms.index');
Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::get('/classrooms/create', [ClassroomController::class, 'create'])->name('classrooms.create');
Route::post('/classrooms', [ClassroomController::class, 'store'])->name('classrooms.store');
Route::get('/classrooms/{classroom}', [ClassroomController::class, 'show'])->name('classrooms.detail');
Route::get('/classrooms/{classroom}/edit', [ClassroomController::class, 'edit'])->name('classrooms.edit');
Route::put('/classrooms/{classroom}', [ClassroomController::class, 'update'])->name('classrooms.update');
Route::delete('/classrooms/{classroom}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');

Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/schedules/{schedule}', [ScheduleController::class, 'show'])->name('schedules.detail');
Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

