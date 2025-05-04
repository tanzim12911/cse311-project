<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $subscribed_matches = auth()->user()->watchlist;
    dd($subscribed_matches->toArray());
});
