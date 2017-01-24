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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/login/redirect/{provider}', ['uses' => 'SocialAuthController@redirect', 'as' => 'login']);
Route::get('/login/{provider}' , 'SocialAuthController@callback');

Route::resource('/user','DataUserController');
Route::resource('/education','EducationUserController');
Route::resource('/workExperience','WorkExperienceController');
Route::resource('/skills','SkillsController');


Route::get('/mails/sendmail','MailsController@createMail');
Route::post('/mails','MailsController@sendMail');
//Route::controller('mails','MailsController');