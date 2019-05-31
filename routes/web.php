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

Route::get('/reports','HomeController@index');
Route::get('/','HomeController@reports');

Route::get('/pdfView/{patient_id}/{prescription_id}','HomeController@pdfView');
Route::get('/parseJson','HomeController@parseJson');
Route::post('/parseJsonPost','HomeController@parseJsonPost');
