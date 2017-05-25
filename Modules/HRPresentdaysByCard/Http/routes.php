<?php

Route::group(['middleware' => 'web', 'prefix' => 'hrpresentdaysbycard', 'namespace' => 'Modules\HRPresentdaysByCard\Http\Controllers'], function()
{
    Route::get('/', 'HRPresentdaysByCardController@index');
});
