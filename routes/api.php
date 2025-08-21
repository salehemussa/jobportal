<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Models\User;

Route::get('/api/v1/users', function () {
    return UserResource::collection(User::all());
});