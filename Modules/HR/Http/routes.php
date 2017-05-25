<?php

Route::group(['middleware' => 'web', 'prefix' => 'hr', 'namespace' => 'Modules\HR\Http\Controllers'], function()
{
    Route::get('/HR', 'HRController@index');
});
