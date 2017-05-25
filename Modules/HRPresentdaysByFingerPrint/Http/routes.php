<?php

Route::group(['middleware' => 'web', 'prefix' => 'hrpresentdaysbyfingerprint', 'namespace' => 'Modules\HRPresentdaysByFingerPrint\Http\Controllers'], function()
{
    Route::get('/', 'HRPresentdaysByFingerPrintController@index');
});
