<?php

use App\Http\Controllers\landingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// create/update landing
Route::middleware('auth:sanctum')->post('/UpdatedLanding', [LandingController::class, 'createLanding']);
Route::get('/Landing', [LandingController::class, 'showLanding']);

// project
Route::post('/Project/CreateProjects', [ProjectController::class, 'createProject']);
Route::patch('/Project/UpdateProjects/{id}', [ProjectController::class, 'updateProject']);
Route::delete('/Project/DeleteProjects/{id}', [ProjectController::class, 'deleteProject']);
Route::get('/Project/{type}', [ProjectController::class, 'showByType']);
Route::get('/Project/Search/{Type}', [ProjectController::class, 'searchPortfolio']);
Route::get('/Project/Filter/{type}', [ProjectController::class, 'filterByTech']);
Route::get('/Project/Fetch-Filter/{type}', [ProjectController::class, 'getTech']);


// Experience

// Login/Logout
Route::post('/Process-Login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->delete('/Process-Logout', [AuthController::class, 'logout']);

