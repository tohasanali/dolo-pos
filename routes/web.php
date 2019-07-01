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

// Route::get('/', function () {
//     return view('admin.pages.index');
// });
Route::get('/', 'HomeController@index');

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function()
{
	Route::middleware('auth:admin')->group(function(){
		//profile
		Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
		Route::get('/myprofile', 'AdminController@myprofile')->name('admin.myprofile');
		Route::post('/profile-update', 'AdminController@updateProfile')->name('admin.updateProfile');
		Route::get('/change-password', 'AdminController@changePassword')->name('admin.changePassword');
		Route::post('/change-password', 'AdminController@changePassword')->name('admin.changePassword');

		//employee
		Route::get('/employees', 'EmployeeDetailController@employees')->name('employees');
		Route::get('/employees-all', 'EmployeeDetailController@employeesAll')->name('employees.all');
		Route::post('/employees-status-change', 'EmployeeDetailController@statusChange')->name('employees.statusChange');
		Route::post('/employee-add-or-update', 'EmployeeDetailController@addOrUpdate')->name('employees.addOrUpdate');

		
		//accounts
		Route::get('/accounts', 'AccountController@accounts')->name('accounts');
		Route::get('/accounts-all', 'AccountController@accountsAll')->name('accounts.all');
		Route::post('/accounts-status-change', 'AccountController@statusChange')->name('accounts.statusChange');
		Route::post('/accounts-add-or-update', 'AccountController@addOrUpdate')->name('accounts.addOrUpdate');










		


















		Route::get('/', 'AdminController@index')->name('admin.index');
	});
	Route::post('/admin/emailCheck', 'Auth\AdminLoginController@emailCheck')->name('admin.emailCheck');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
    Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

	Route::get('/{wild}', 'AdminController@page404')->name('admin.page404');
});



Route::prefix('employee')->group(function()
{
	Route::middleware('auth:employee')->group(function(){
		//profile
		Route::get('/dashboard', 'EmployeeController@dashboard')->name('employee.dashboard');	
		Route::get('/myprofile', 'EmployeeController@myprofile')->name('employee.myprofile');	
		Route::post('/profile-update', 'EmployeeController@updateProfile')->name('employee.updateProfile');
		Route::get('/change-password', 'EmployeeController@changePassword')->name('employee.changePassword');
		Route::post('/change-password', 'EmployeeController@changePassword')->name('employee.changePassword');

		Route::get('/', 'EmployeeController@index')->name('employee.index');
	});
	Route::post('/employee/emailCheck', 'Auth\EmployeeLoginController@emailCheck')->name('employee.emailCheck');
	Route::get('/login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
	Route::post('/login', 'Auth\EmployeeLoginController@login');
    Route::post('/logout', 'Auth\EmployeeLoginController@employeeLogout')->name('employee.logout');

	Route::get('/{wild}', 'EmployeeController@page404')->name('employee.page404');
});

Route::prefix('common')->group(function()
{
	Route::middleware('auth:admin')->group(function(){

	});

	Route::middleware('auth:employee')->group(function(){	


	});

	Route::middleware('auth:admin,employee')->group(function(){


	});
	Route::get('/{wild}', 'HomeController@page404')->name('admin.page404');
});

Route::get('/index', 'HomeController@page404')->name('site.index');
Route::get('/page404', 'HomeController@page404')->name('page404');
Route::get('/{wild}', 'HomeController@page404');

