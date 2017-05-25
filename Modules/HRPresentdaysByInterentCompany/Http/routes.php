<?php

Route::group(['middleware' => 'web', 'prefix' => 'hrpresentdaysbyinterentcompany', 'namespace' => 'Modules\HRPresentdaysByInterentCompany\Http\Controllers'], function()
{
    Route::get('/', 'HRPresentdaysByInterentCompanyController@index');
});
