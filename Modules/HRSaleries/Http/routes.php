<?php

Route::group(['middleware' => 'web', 'prefix' => 'hrsaleries', 'namespace' => 'Modules\HRSaleries\Http\Controllers'], function()
{
    Route::get('/', 'HRSaleriesController@index');
});
