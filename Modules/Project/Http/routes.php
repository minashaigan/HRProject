<?php

Route::get('/Projectmanage/project','Modules\Project\Http\Controllers\ProjectController@index');
Route::post('/Projectmanage/project','Modules\Project\Http\Controllers\ProjectController@addproject');
Route::post('/Projectmanage/project/addfile','Modules\Project\Http\Controllers\ProjectController@addfile');
Route::post('/Projectmanage/project/adduser','Modules\Project\Http\Controllers\ProjectController@adduser');
Route::post('/Projectmanage/project/updateproject','Modules\Project\Http\Controllers\ProjectController@updateproject');
Route::get('/Projectmanage/project/show','Modules\Project\Http\Controllers\ProjectController@showproject');
Route::get('/Projectmanage/project/show/{id}','Modules\Project\Http\Controllers\ProjectController@showoneproject');
Route::get('/Projectmanage/project/{id}/edit','Modules\Project\Http\Controllers\ProjectController@editproject');
Route::get('/Projectmanage/project/tag/{id}/edit/delete','Modules\Project\Http\Controllers\ProjectController@deletetag');
Route::get('/Projectmanage/project/{pid}/user/{id}/edit/delete','Modules\Project\Http\Controllers\ProjectController@deleteuser');
Route::get('/Projectmanage/project/show/{id}/deletefile','Modules\Project\Http\Controllers\ProjectController@deletefile');
Route::get('/test','Modules\Project\Http\Controllers\ProjectController@test');
