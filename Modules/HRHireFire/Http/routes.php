<?php

Route::group(['middleware' => 'web', 'prefix' => 'hrhirefire', 'namespace' => 'Modules\HRHireFire\Http\Controllers'], function()
{
    Route::get('/', 'HRHireFireController@index');
});
