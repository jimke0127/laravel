<?php

use App\Livewire\CreatePoll;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/create-poll', CreatePoll::class);
