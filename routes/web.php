<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;

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

Route::get('add', function () {
    $User = User::all();
        if (Auth::user()->type == '1')
        {
            return view('add');
        }else
        {
            return view('home');
        }
    
});

Route::get('addVideo', function () {
    $User = User::all();
    if (Auth::user()->type == '1')
    {
        return view('adds.addVideo');
    }else
    {
        return view('home');
    }
    
});

Route::get('manageContent', function () {
    $User = User::all();
    if (Auth::user()->type == '1')
    {
        return view('adds.manageContent');
    }else
    {
        return view('home');
    }
    
}); 

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/newsdetails', 'HomeController@newsdetails');
Route::get('/NewsDetailsOne', 'HomeController@NewsDetailsOne');
Route::post('/newcomment', 'HomeController@newcomment');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/importantnews', 'HomeController@importantnews');
Route::get('/latestnews', 'HomeController@latestnews');
Route::get('/search', 'HomeController@search');

//subject Function
Route::get('/subject', 'subjectController@subject');

Route::post('/addnewsubject', 'subjectController@addnewsubject');

Route::get('/deletesubject', 'subjectController@deletesubject');

Route::get('/editsubject', 'subjectController@editsubject');

Route::post('/submiteditsubject', 'subjectController@submiteditsubject');

//ManageContent Function
Route::get('/managenontent', 'ManageContentController@managenontent');

Route::post('/addnewmanagenontent', 'ManageContentController@addnewmanagenontent');

Route::get('/deletemanagenontent', 'ManageContentController@deletemanagenontent');

Route::get('/editmanagenontent', 'ManageContentController@editmanagenontent');

Route::post('/submiteditmanagenontent', 'ManageContentController@submiteditmanagenontent');

