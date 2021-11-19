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

Auth::routes();

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::get('/hakemler','RefereeController@index');
Route::get('/match/scan','MatchController@scrap');
Route::get('/match/datatable','MatchController@datatable')->name('match.datatable');
Route::get('/matches','MatchController@index')->name('match.index');
Route::get('/matches/point','MatchController@point')->name('match.point');
Route::get('/matches/match','MatchController@match')->name('match.match');
Route::get('/parameters','MatchController@parameters')->name('match.parameters');
Route::get('/referee/datatable','RefereeController@datatable')->name('referee.datatable');
Route::get('/referee','RefereeController@index')->name('referee.index');
Route::get('/matches/current','RefereeController@currentMatches')->name('referee.currentMatches');

