<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login','usercontroller@login');
Route::get('register','usercontroller@register');
Route::post('registerinsert','usercontroller@insertregister');
Route::post('companylogin','usercontroller@companylogin');
 Route::post('dashboard','usercontroller@dashboard');
 Route::get('dropdown','usercontroller@dropdown');


Route::get('forgetpassword','usercontroller@forgetpassword');
Route::post('conformpassword','usercontroller@conformpassword');

Route::get('role/{age?}',[
    'middleware' => 'age',
    'uses' => 'usercontroller@divide',
 ]);
 Route::get('lorrydetails','usercontroller@lorrydetails');
 Route::post('insertlorrydetails','usercontroller@insertlorrydetails');
 Route::get('lorrydetailsedit/{id}','usercontroller@lorrydetailsedit');
 Route::post('lorrydetailsedit/{id}','usercontroller@lorrydetailsupdate');
 Route::get('delete/{id}','usercontroller@delete');
 Route::get('picklorry','usercontroller@picklorry');
 Route::post('selectlorry','usercontroller@selectlorry');
 Route::get('download/{finalbill}','usercontroller@download');

