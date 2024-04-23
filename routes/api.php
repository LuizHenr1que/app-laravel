<?php

use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/supports', SupportController::class);