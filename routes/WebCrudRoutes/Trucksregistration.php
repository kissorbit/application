<?php
Route::group(['middleware' => ['web', 'auth','permission:Trucksregistration']],function(){
    Route::get('/Trucksregistration/',array('uses'=>'TrucksregistrationController@Index','as'=>'TrucksregistrationIndex'));
    Route::get('/Trucksregistration/list',array('uses'=>'TrucksregistrationController@All','as'=>'Trucksregistrationlist'));
    Route::post('/Trucksregistration/create_or_update',array('uses'=>'TrucksregistrationController@CreateOrUpdate','as'=>'Trucksregistrationcreateorupdate'));
    Route::get('/Trucksregistration/edit/{id}',array('uses'=>'TrucksregistrationController@edit','as'=>'Trucksregistrationedit'));
    Route::post('/Trucksregistration/update/{id}',array('uses'=>'TrucksregistrationController@Update','as'=>'Trucksregistrationupdate'));
    Route::delete('/Trucksregistration/delete/{id}',array('uses'=>'TrucksregistrationController@Delete','as'=>'Trucksregistrationdelete'));
    Route::delete('/Trucksregistration/delete_multiple', array('uses' => 'TrucksregistrationController@DeleteMultiple', 'as' => 'Trucksregistrationdeletemultiple'));
});
