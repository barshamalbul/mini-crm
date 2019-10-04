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
    if(Auth::user())
    {
        return redirect('/home');
    }
    else
    {
        return view('auth.login');
    }
});

Auth::routes(['register' => false,
               'reset' => false, 
               'verify' => false,
            ]);
            Route::get('/home','HomeController@index')->name('home');


Route::middleware(['middleware'=>'auth','authMiddleware'])->group(function () {
   

            Route::get('/employees','EmployeesController@index')->name('employees');
            Route::get('/companies','CompaniesController@index')->name('companies');

            Route::get('/employees_create','EmployeesController@create')->name('employees_create');
            Route::get('/companies_create','CompaniesController@create')->name('companies_create');

            Route::post('/companies_store','CompaniesController@store')->name('companies_store');
            Route::post('/employees_store','EmployeesController@store')->name('employees_store');

            Route::get('/employees_edit/{id}','EmployeesController@edit')->name('employees_edit');

            Route::post('/employees_update/{id}','EmployeesController@update')->name('employees_update');   

            Route::get('/employees_delete/{id}','EmployeesController@destroy')->name('employees_delete');   

            Route::get('/company_edit/{companies}','CompaniesController@edit')->name('company_edit');
            Route::post('/company_update/{companies}','CompaniesController@update')->name('companies_update');   

            Route::delete('/company_delete/{id}','CompaniesController@destroy')->name('company_delete');

});