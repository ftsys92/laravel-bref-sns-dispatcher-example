<?php

use App\Http\Controllers\Api\V1\SnsController;
use Illuminate\Support\Facades\Route;

Route::post('/sns/publish', [SnsController::class, 'publish']);
