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

Route::get('About', function () {
    return 'About-Us';
});
Route::view('welcome-to','welcome');
Route::view('contact','contact-us'); 

Auth::routes(); 

Route::prefix('result')->name('result.')->middleware(['auth'])->group(function() {
 
    Route::get('finalResult','ResultsController@finalResult')->name('finalResult');
	//insert Result
	Route::get('selectResult','ResultsController@selectResult')->name('selectResult');
    Route::post('insertResult','ResultsController@insertResult')->name('insertResult');
   
	Route::post('ShowStudents','UserController@ShowStudents')->name('ShowStudents');
	//get student oneSemester
	Route::get('oneSemester','ResultsController@oneSemester')->name('oneSemester');
	Route::post('getoneSemester','ResultsController@getoneSemester')->name('getoneSemester');
	//showtResult
	Route::get('showtResult','ResultsController@showtResult')->name('showtResult');
	Route::post('getResult','ResultsController@getResult')->name('getResult');
	//showtResultWithGrade
	Route::get('showtResultWithGrade','ResultsController@showtResultWithGrade')->name('showtResultWithGrade');
	Route::post('getResultWithGrade','ResultsController@getResultWithGrade')->name('getResultWithGrade');
	//edit one subject for one student
	Route::get('EditOneSubjectOneStudent','ResultsController@EditOneSubjectOneStudent')->name('EditOneSubjectOneStudent');
	Route::post('InsertOneSubjectOneStudent','ResultsController@InsertOneSubjectOneStudent')->name('InsertOneSubjectOneStudent');
	//Student Year result
	Route::get('GetYearStudentResult','ResultsController@GetYearStudentResult')->name('GetYearStudentResult');
	Route::post('ShowYearStudentResult','ResultsController@ShowYearStudentResult')->name('ShowYearStudentResult');
	Route::post('UpdateOneSubjectOneStudent','ResultsController@UpdateOneSubjectOneStudent')->name('UpdateOneSubjectOneStudent');
 
});//end of result routes
   
Route::prefix('appendices')->name('appendices.')->middleware(['auth'])->group(function() {
	
Route::get('appendices','ResultsController@appendices')->name('appendices');
Route::post('getAppendices','ResultsController@getAppendices')->name('getAppendices');

Route::get('selectAppendicesStudent','ResultsController@selectAppendicesResult')->name('selectAppendicesResult');
Route::post('insertAppendicesResult','ResultsController@insertAppendicesResult')->name('insertAppendicesResult');
Route::post('updateResult','ResultsController@updateResult')->name('updateResult');
//Appendices for one Student
Route::get('AppendicesOneStudent','ResultsController@AppendicesOneStudent')->name('AppendicesOneStudent');
Route::post('InsertAppendicesOneStudent','ResultsController@InsertAppendicesOneStudent')->name('InsertAppendicesOneStudent');

Route::get('SelectAppendicesSubjects','ResultsController@selectAppendicesSubjectsOneStudent')->name('selectAppendicesSubjectsOneStudent');
});//end of appendices routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/changePassword','UserController@showChangePasswordForm')->name('changePassword');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');
Route::get('logout','Auth\LoginController@userLogout')->name('user.logout');
Route::get('SelectStudent','UserController@SelectStudent')->name('SelectStudent');
Route::post('EditStudent','UserController@EditStudent')->name('EditStudent');

 Route::get('GetStudents','UserController@GetStudents')->name('GetStudents');
//appendices
	
Route::post('ShowSubjects','ResultsController@showAppendicesSubjectsOneStudent')->name('showAppendicesSubjectsOneStudent');

//don
//transform
Route::get('prepartransform','UserController@prepartransform')->name('prepartransform');
Route::post('transform','UserController@transform')->name('transform');
Route::resource('users','UserController');

Route::get('/getdepts/{id}','ResultsController@getdepts')->name('getdepts');
Route::get('/getsubject/{id}','ResultsController@getsubject')->name('getsubject');


Route::post('StoreAppendicesOneStudent','ResultsController@StoreAppendicesOneStudent')->name('StoreAppendicesOneStudent');
Route::resource('results','ResultsController');
Route::resource('depts','DeptController');

Route::get('selectDept','SubjectsController@selectDept')->name('selectDept');
Route::post('showtSubject','SubjectsController@showtSubject')->name('showtSubject');
Route::resource('subjects','SubjectsController');
//not complete
Route::get('details','ResultsController@details')->name('details');
Route::post('getdetails','ResultsController@getdetails')->name('getdetails');

