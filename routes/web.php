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

// Student tester CRUD using AJAX
Route::get('addsubject', 'AjaxdataController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');
Route::post('ajaxdata/postdata', 'AjaxdataController@postdata')->name('ajaxdata.postdata');
Route::get('ajaxdata/fetchdata', 'AjaxdataController@fetchdata')->name('ajaxdata.fetchdata');
Route::get('ajaxdata/removedata', 'AjaxdataController@removedata')->name('ajaxdata.removedata');

//Route::get('/', 'MyController@Login');
Route::post('/checklogin', 'MyController@checklogin');
Route::get('/index', 'MyController@Index');
Route::get('/logout', 'MyController@logout');
Route::get('/pertest', 'MyController@Personality');

//Route for Add, update, delete class
Route::get('/addclass', 'ClassSubjController@AddClass');
Route::post('/insertclass', 'ClassSubjController@InsertClass');
Route::get('/classtable', 'ClassSubjController@ClassTable');
Route::get('/update', 'ClassSubjController@update');
Route::get('delete/{id}','ClassSubjController@DeleteDegree');

//Route for add and insert subject
//Route::get('/addsubject', 'ClassSubjController@index');
Route::post('/store', 'ClassSubjController@store');
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