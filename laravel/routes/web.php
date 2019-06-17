<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('doctors/create', 'doctorController@create' );
Route::post('doctors/', 'doctorController@store' );
Route::get('doctors/', 'doctorController@index' );
Route::get('doctors/{id}', 'doctorController@show' );
Route::get('doctors/edit/{id}', 'doctorController@edit' );
Route::get('doctors/delete/{id}', 'doctorController@delete' );
Route::post('doctors/edit/', 'doctorController@editStore' );

Route::get('patients/', 'PatientController@index' )->middleware('auth');
Route::get('patients/{id}', 'PatientController@show' )->middleware('auth');
Route::post('patients/', 'PatientController@store' );


Route::get('specializations/', 'SpecializationController@index' );
Route::get('specializations/create', 'SpecializationController@create' );
Route::post('specializations/', 'SpecializationController@store' );

Route::get('visits/', 'VisitController@index' );
Route::get('visits/create', 'VisitController@create' );
Route::post('visits/', 'VisitController@store' );


Route::get('doctors/specializations/{id}', 'doctorController@listSpecial' );
//Route:: prefix('admin')->group(function(){
//Route::get('/test/{name}/{number?}', function ($name, $number=100) {
//    return $name . " - " . $number ;
//})->name('aaa');

//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
