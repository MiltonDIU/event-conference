<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SpeakersController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\VenuesController;
use App\Http\Controllers\Admin\HotelsController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\SponsorsController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\PricesController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{id}/{slug}', [HomeController::class, 'singleEvent'])->name('singleEvent');
Route::get('speaker/{speaker}', [HomeController::class, 'view'])->name('speaker');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class,'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);
    // Roles

    Route::delete('roles/destroy', [RolesController::class,'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class,'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    // Settings
    Route::delete('settings/destroy', [SettingsController::class,'massDestroy'])->name('settings.massDestroy');
    Route::resource('settings', SettingsController::class);

    // Speakers

    Route::delete('speakers/destroy', [SpeakersController::class,'massDestroy'])->name('speakers.massDestroy');
    Route::post('speakers/media', [SpeakersController::class,'storeMedia'])->name('speakers.storeMedia');
    Route::resource('speakers', SpeakersController::class);


    // Schedules
    Route::delete('schedules/destroy', [ScheduleController::class,'massDestroy'])->name('schedules.massDestroy');
    Route::resource('schedules', ScheduleController::class);

    // Venues
    Route::delete('venues/destroy', [VenuesController::class,'massDestroy'])->name('venues.massDestroy');
    Route::post('venues/media', [VenuesController::class,'storeMedia'])->name('venues.storeMedia');
    Route::resource('venues', VenuesController::class);

    // Hotels
    Route::delete('hotels/destroy', [HotelsController::class,'massDestroy'])->name('hotels.massDestroy');
    Route::post('hotels/media', [HotelsController::class,'storeMedia'])->name('hotels.storeMedia');
    Route::resource('hotels', HotelsController::class);

    // Galleries

    Route::delete('galleries/destroy', [GalleriesController::class,'massDestroy'])->name('galleries.massDestroy');
    Route::post('galleries/media', [GalleriesController::class,'storeMedia'])->name('galleries.storeMedia');
    Route::resource('galleries', GalleriesController::class);

    // Sponsors
    Route::delete('sponsors/destroy', [SponsorsController::class,'massDestroy'])->name('sponsors.massDestroy');
    Route::post('sponsors/media', [SponsorsController::class,'storeMedia'])->name('sponsors.storeMedia');
    Route::resource('sponsors', SponsorsController::class);

    // Faqs

    Route::delete('faqs/destroy', [FaqsController::class,'massDestroy'])->name('faqs.massDestroy');
    Route::resource('faqs', FaqsController::class);

    // Amenities
    Route::delete('amenities/destroy', [AmenitiesController::class,'massDestroy'])->name('amenities.massDestroy');
    Route::resource('amenities', AmenitiesController::class);

    // Prices
    Route::delete('prices/destroy', [PricesController::class,'massDestroy'])->name('prices.massDestroy');
    Route::resource('prices', PricesController::class);

    // Events
    Route::delete('events/destroy', [EventsController::class,'massDestroy'])->name('events.massDestroy');
    Route::post('events/media', [EventsController::class,'storeMedia'])->name('events.storeMedia');
    Route::resource('events', EventsController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
