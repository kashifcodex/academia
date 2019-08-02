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
   return view('login');
});

//Route::get('/', 'MyController@Login');
Route::post('/checklogin', 'MyController@checklogin');
Route::get('/index', 'MyController@Index');
Route::get('/logout', 'MyController@logout');
Route::get('/pertest', 'MyController@Personality');

//Route for add and insert class
Route::get('/addclass', 'ClassSubjController@AddClass');
Route::post('/insertclass', 'ClassSubjController@InsertClass');
//Route for add and insert subject
Route::get('/addsubject', 'ClassSubjController@AddSubject');
Route::post('/insertsubject', 'ClassSubjController@InsertSubject');

//Route for add and insert Chapter
Route::get('/addchapter', 'ClassSubjController@AddChapter');
Route::post('/insertchapter', 'ClassSubjController@InsertChapter');

//Route for add and insert MCQ's
Route::get('/addmcqs', 'ClassSubjController@AddMCQS');
Route::post('/insertmcqs', 'ClassSubjController@InsertMCQS');

//Route for add and insert Tutorials
Route::get('/addtutorials', 'ClassSubjController@AddTutorials');
Route::post('/inserttutorials', 'ClassSubjController@InsertTutorials');

Route::group(['middleware' => 'checkRole'] ,function (){
    Route::get('check',function() {
        echo 'sdf';
    });


});




Route::get('/checking',function(){
    echo 'asdf';
});

        
        Auth::routes();