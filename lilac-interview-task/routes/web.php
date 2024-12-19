<?php

use App\Http\Controllers\SearchController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['controller' => SearchController::class], function () {
    Route::get('/', 'getAllUsers');
    Route::get('/search', 'searchByUserDesignationDepartment');
});
