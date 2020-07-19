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
Route::get('news/{id}','Fronen\NewsController@show')->name('news.show');
Route::namespace('Frontend')->middleware('checkauth')->group(function(){
	Route::get('/approval', 'HomeController@approval')->name('approval');
		Route::middleware(['approved'])->group(function () { 
		Route::get('/tenderer/show/{id}', 'TendererController@show')
		->name('tenderer.show');
		//Project
		Route::get('/project/create','ProjectController@formcreate')
		->name('project.create');

		Route::post('/project/create','ProjectController@store')
		->name('project.post.create');

		Route::get('/project/show/{id}', 'ProjectController@show')
		->name('project.show');

		Route::get('/project/list/{id}','ProjectController@list')
		->name('project.list');

		Route::get('/project/edit/{id}','ProjectController@edit')
		->name('project.edit');

		Route::post('/project/update/{id}','ProjectController@update')
		->name('project.update');

		Route::delete('/project/delete/{id}','ProjectController@destroy')
		->name('project.delete');
		
		Route::get('/project/detail','ProjectController@detail')
		->name('project.detail');
		//Contractor
		Route::post('/contractor/join','ProjectController@attachContractor')
		->name('contractor.join');
		Route::post('/contractor/project/update/{id}','ContractorController@updateProject')
		->name('contractor.project.update');
		//Order
		Route::post('/order','OrderController@store')
		->name('create.order');
		Route::get('/order/show/{id}','OrderController@show')
		->name('order.show');
		Route::get('/order/list/{id}','OrderController@list')
		->name('order.list');
     });
});


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')
->name('admin.login');
Route::get('/login/tenderer', 'Auth\LoginController@showTendererLoginForm')
->name('tenderer.login');
Route::get('/login/contractor', 'Auth\LoginController@showContractorLoginForm')
->name('contractor.login');


Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/tenderer', 'Auth\RegisterController@showTendererRegisterForm')
->name('tenderer.register');
Route::get('/register/contractor', 'Auth\RegisterController@showContractorRegisterForm')
->name('contractor.register');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/tenderer', 'Auth\LoginController@tendererLogin');
Route::post('/login/contractor', 'Auth\LoginController@contractorLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/tenderer', 'Auth\RegisterController@createTenderer');
Route::post('/register/contractor', 'Auth\RegisterController@createContractor');

Route::get('/logout/admin','Auth\LogoutController@adminLogout')
->name('admin.logout');
Route::get('/logout/tenderer','Auth\LogoutController@tendererLogout')
->name('tenderer.logout');
Route::get('/logout/contractor','Auth\LogoutController@contractorLogout')
->name('contractor.logout');


Route::namespace('Backend')->group(function(){
	Route::get('/admin', 'DashboardController@index')->name('admin');
	Route::get('/tenderer/index', 'TendererController@index')
	->name('backend.tenderer.index');
	Route::get('/tenderer/approved', 'TendererController@listapproved')
	->name('tenderer.getlistapproved');
	Route::get('/tenderer/approved/{id}', 'TendererController@approved')
	->name('tenderer.approved');
	Route::get('/contractor/index', 'ContractorController@index')
	->name('backend.contractor.index');
	Route::get('/contractor/approved', 'ContractorController@listapproved')
	->name('contractor.getlistapproved');
	Route::post('/contractor/approved/{id}', 'ContractorController@approved')
	->name('contractor.approved');
	Route::resource('/category', 'CategoryController');
	Route::resource('/unit','UnitController');
	Route::resource('/news','NewsController');
	Route::post('ckeditor/image_upload', 'CKEditorController@upload')
	->name('upload');

});
