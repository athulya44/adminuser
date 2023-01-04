

<?php 

use App\Http\Controllers\AdminuserController;
use App\Http\Controllers\AdminController;
use illuminate\support\facades\auth;
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::get('/login/writer', 'App\Http\Controllers\Auth\LoginController@showWriterLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
Route::get('/register/writer', 'App\Http\Controllers\Auth\RegisterController@showWriterRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/writer', 'App\Http\Controllers\Auth\LoginController@writerLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');
Route::post('/register/writer', 'App\Http\Controllers\Auth\RegisterController@register');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/writer', 'writer');

Route::get('/index',function ()
{
    return view('layouts.index');
});
Route::get('/dashboardadmin',function ()
{
    return view('admin');
});
Route::get('/blank',function ()
{
    return view('blank');
});
Route::get('/profiledetails',function ()
{
    return view('profiledetails');
});
Route::get('/dashboardwriter',function ()
{
    return view('writer');
});

Route::resource('adminusers', AdminuserController::class);

Route::resource('adminlist', AdminController::class);

Route::get('profile',[App\Http\Controllers\UserController::class ,'index']);
Route::post('profile',[App\Http\Controllers\UserController::class ,'updateUserDetails']);


?>
