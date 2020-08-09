<?php

use Rapi\Core\Support\Facades\RapiResponse;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'v1', 'namespace' => 'Domain'], function () {

    Route::resource('merchants', 'Merchant\Http\MerchantController');
    Route::resource('categories', 'Category\Http\CategoryController');
    Route::resource('addresses', 'Address\Http\AddressController');
    Route::resource('events', 'Event\Http\EventController');
    Route::get('events/search', 'Event\Http\EventResumeController@resume');
});

# Version
Route::get('/', function () {
    return RapiResponse::withData([
        'name' => config('app.name'),
        'version' => config('app.version'),
        'locale' => app()->getLocale(),
    ]);
});
