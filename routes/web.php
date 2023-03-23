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
    return view('createlogin');
});

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('Login', function () {
return view('createlogin');
});
Route::post('checkLogin','admincontroller@checkLogin');
Route::get('logout','HomeController@logout');
// Route::get('/dashboard', 'admincontroller@checkLogin')->name('home');
        
Route::group(['middleware'=>'loginmiddleware'],function(){

Route::group(['middleware'=>'EmployeeMiddleWare'],function(){
Route::get('createNewEmp','HomeController@createNewEmployee');
Route::post('saveCreateNewEmp','HomeController@saveCreateNewEmployee');
Route::get('employeeEditData/{id}','HomeController@employeeEditData');
Route::put('updateNewEmp/{id}','HomeController@updateNewEmploye');
Route::get('delete/{id}','HomeController@delete');
Route::get('viewEmployeDetails','HomeController@viewEmployeeDetails');
Route::get('viewAdminAndNonAdminEmployeDetails','HomeController@viewAdminAndNonAdminEmployeeDetails');

Route::get('adminpage_404_Error', function () {
return view('layouts.Adminpage_404_error');

});
});
// Route::get('ViewUserDetails','Admincontroller@ViewEmployeeDetails');






Route::get('404Error', function () {
return view('layouts.404error');
})->middleware('Adminmiddleware'); 

Route::get('viewNonAdminEmployeDetails','HomeController@viewNonAdminEmployeeDetails')->middleware('Adminmiddleware');
});
//Non-Admin

// Route::get('{any}','admincontroller@emptyUrl');

Route::get('send-test','admincontroller@sendEmail');



