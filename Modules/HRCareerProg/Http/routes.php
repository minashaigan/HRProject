<?php

Route::group(['middleware' => 'web', 'prefix' => 'hrcareerprog', 'namespace' => 'Modules\HRCareerProg\Http\Controllers'], function()
{
    Route::get('/', 'HRCareerProgController@index');
});
