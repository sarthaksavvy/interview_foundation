<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/github/repo/starred', 'GithubController')->name('starred.repos');
Route::post('/token', 'TokenController')->name('user.token');
Route::delete('/token', 'TokenController@destroy')->name('user.token');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
