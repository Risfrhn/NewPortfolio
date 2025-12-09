<?php

use App\Http\Controllers\landingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// create/update landing
Route::POST('/UpdatedLanding', [LandingController::class, 'createLanding']);
Route::GET('/Landing', [LandingController::class, 'showLanding']);

// project
Route::POST('/Project/CreateProjects', [ProjectController::class, 'createProject']);
Route::PATCH('/Project/UpdateProjects/{id}', [ProjectController::class, 'updateProject']);
Route::DELETE('/Project/DeleteProjects/{id}', [ProjectController::class, 'deleteProject']);
Route::GET('/Project/{type}', [ProjectController::class, 'showByType']);
Route::GET('/Project/Search/{Type}', [ProjectController::class, 'searchPortfolio']);
Route::GET('/Project/Filter/{type}', [ProjectController::class, 'filterByTech']);
Route::GET('/Project/Fetch-Filter/{type}', [ProjectController::class, 'getTech']);


// Experience

// Login/Logout
Route::POST('/Process-Login', [AuthController::class, 'login']);

