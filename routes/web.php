<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'welcome'])
    ->name('home');

Route::get('/announcements/create', [AnnouncementController::class, 'create'])
    ->middleware('auth')
    ->name('announcements.create');

    Route::get('/announcements', [AnnouncementController::class, 'index'])
    ->name('announcements.index');

    Route::get('/show/announcements/{announcement}', [AnnouncementController::class, 'show'])
    ->name('announcements.show');

    Route::get('/category/{category}', [AnnouncementController::class, 'byCategory'])
    ->name('byCategory');

    Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')
    ->name('revisor.index');

    Route::patch('accept/{announcement}', [RevisorController::class, 'accept'])->middleware('isRevisor')
    ->name('accept');

    Route::patch('reject/{announcement}', [RevisorController::class, 'reject'])->middleware('isRevisor')
    ->name('reject');

    Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')
    ->name('become.revisor');

Route::get('make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
