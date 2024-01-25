<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatterBlastController;
use App\Http\Controllers\DreamWeaverController;
use App\Http\Controllers\MindReaderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/conversation', [ChatterBlastController::class, 'createConversation']);
Route::post('/conversation/{id}', [ChatterBlastController::class, 'sendPromptToCon']);
Route::get('/conversation/{id}', [ChatterBlastController::class, 'getPartCon']);


Route::post('/generate', [DreamWeaverController::class, 'generateImageBasedText']);
Route::get('/status/{id}', [DreamWeaverController::class, 'getTheStatusAndProgress']);
Route::get('/result/{id}', [DreamWeaverController::class, 'getResult']);
Route::post('/upscale', [DreamWeaverController::class, 'upscaleGeneratedImage']);
Route::post('/zoom/in', [DreamWeaverController::class, 'zoomIn']);
Route::post('/zoom/out', [DreamWeaverController::class, 'zoomOut']);



Route::post('/recognize', [MindReaderController::class, 'recognizeImage']);


Route::get('/get-news', [\App\Http\Controllers\ModuleENewAPIController::class, 'getNews']);
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
