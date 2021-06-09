<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\CommandGroupController;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::group(['middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', function() {
        return redirect()->route('admin.commands.index');
    });

    Route::resource('commands', CommandController::class);
    Route::resource('command-groups', CommandGroupController::class);
});
