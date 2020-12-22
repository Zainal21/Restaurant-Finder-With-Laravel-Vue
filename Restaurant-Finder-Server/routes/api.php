<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\{
    AuthController,
    RestaurantController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/v1/login', [AuthController::class, 'login'])->name('login');
Route::post('/v1/register', [AuthController::class, 'register'])->name('register');
Route::get('/v1/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['prefix' => '/v1/restaurant'], function(){
    Route::get('/', [RestaurantController::class, 'index']);
    Route::get('/{id}', [RestaurantController::class, 'index']);
    Route::post('/', [RestaurantController::class, 'save']);
    Route::put('/update/{id}', [RestaurantController::class, 'save']);
    Route::delete('/delete/{id}', [RestaurantController::class, 'destroy']);
});
// Route::group(['middleware' => 'jwt.verify'], function(){
   
//     });

// });


