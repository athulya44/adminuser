

<?php 

use App\Http\Controllers\AdminuserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WriterprofileController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\SubCategoryContoller;
use Illuminate\Validation\Validator\validate;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsFormController;
use illuminate\support\facades\auth;
use App\Http\Controllers\DashboardController;
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
Route::any('frontends.destroy',[App\Http\Controllers\FrontendController::class,'destroy']);

Route::resource('admins', AdminController::class);
Route::resource('writerprofiles', WriterprofileController::class);
Route::resource('writers', WriterController::class);
Route::resource('frontends', FrontendController::class);
Route::get('profile',[App\Http\Controllers\UserController::class,'index']);
Route::post('profile',[App\Http\Controllers\UserController::class,'updateUserDetails']);
Route::any('profileview',[App\Http\Controllers\UserController::class,'view']);
//
Route::get('profilewriter',[App\Http\Controllers\WriterprofileController::class,'index']);
Route::post('profilewriter',[App\Http\Controllers\WriterprofileController::class,'edit']);

Route::any('profilewriterview',[App\Http\Controllers\WriterprofileController::class,'show']);
Route::any('profilewriterprofile',[App\Http\Controllers\WriterprofileController::class,'profile']);
Route::get('writerview',[DashboardController::class,'index']);


// userdetails
Route::get('/contact', [App\Http\Controllers\ContactUsFormController::class, 'createForm']);
Route::post('/contact', [App\Http\Controllers\ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::resource('categories',App\Http\Controllers\CategoryController::class);

//subcategory


Route::resource('sub-categories',App\Http\Controllers\SubCategoryController::class);


?>
