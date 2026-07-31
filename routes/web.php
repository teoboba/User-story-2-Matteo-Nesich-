<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;

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
