<?php

use App\Http\Controllers\Features\FeatureController;

/**
 * Features.
 */
Route::resource('/feature-requests', FeatureController::class);
