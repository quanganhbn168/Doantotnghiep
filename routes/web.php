<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use Illuminate\Http\Request;
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

Auth::routes();
Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::namespace('Frontend')->middleware('checkauth')->group(function(){
	Route::get('/project/create','ProjectController@formcreate')->name('project.create');
	Route::post('/project/create','ProjectController@store')->name('project.post.create');
	Route::get('/project/show/{id}', 'ProjectController@show')->name('project.show');
	Route::get('/tenderer/show/{id}', 'TendererController@show')->name('tenderer.show');
	Route::get('/project/list/{id}','ProjectController@list')->name('project.list');
	Route::get('/project/update/{id}','ProjectController@update')->name('project.update');
	Route::delete('/project/delete/{id}','ProjectController@destroy')->name('project.delete');
	Route::post('/contractor/join','ProjectController@attachContractor')->name('contractor.join');
	Route::post('/contractor/project/update/{id}','ContractorController@updateProject')->name('contractor.project.update');
	Route::post('/order','OrderController@store')->name('create.order');
	Route::get('/order/show/{id}','OrderController@show')->name('order.show');
	Route::get('/order/list/{id}','OrderController@list')->name('order.list');
});


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::get('/login/tenderer', 'Auth\LoginController@showTendererLoginForm')->name('tenderer.login');
Route::get('/login/contractor', 'Auth\LoginController@showContractorLoginForm')->name('contractor.login');


Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/tenderer', 'Auth\RegisterController@showTendererRegisterForm');
Route::get('/register/contractor', 'Auth\RegisterController@showContractorRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/tenderer', 'Auth\LoginController@tendererLogin');
Route::post('/login/contractor', 'Auth\LoginController@contractorLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/tenderer', 'Auth\RegisterController@createTenderer');
Route::post('/register/contractor', 'Auth\RegisterController@createContractor');

Route::get('/logout/admin','Auth\LogoutController@adminLogout')->name('admin.logout');
Route::get('/logout/tenderer','Auth\LogoutController@tendererLogout')->name('tenderer.logout');
Route::get('/logout/contractor','Auth\LogoutController@contractorLogout')->name('contractor.logout');


Route::namespace('Backend')->group(function(){
	Route::get('/admin', function(){ return view('backend/index');})->name('admin');
	Route::get('/tenderer/show', 'TendererController@index')->name('backend.tenderer.show');
	Route::resource('/category', 'CategoryController');
	Route::resource('/unit','UnitController');

});
