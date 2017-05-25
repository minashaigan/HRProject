<?php

Route::group(['middleware' => 'web', 'prefix' => 'hrworkdays', 'namespace' => 'Modules\HRWorkdays\Http\Controllers'], function()
{
    Route::get('/', 'HRWorkdaysController@index');
});
