<?php
Route::group(['middleware' => ['auth','permission:Trucksregistration']],function(){
    Route::get('/Trucksregistration/list',array('uses'=>'TrucksregistrationController@All','as'=>'api_Trucksregistrationlist'));
    Route::post('/Trucksregistration/create_or_update',array('uses'=>'TrucksregistrationController@CreateOrUpdate','as'=>'api_Trucksregistrationcreateorupdate'));
    Route::get('/Trucksregistration/edit/{id}',array('uses'=>'TrucksregistrationController@edit','as'=>'api_Trucksregistrationedit'));
    Route::post('/Trucksregistration/update/{id}',array('uses'=>'TrucksregistrationController@Update','as'=>'api_Trucksregistrationupdate'));
    Route::delete('/Trucksregistration/delete/{id}',array('uses'=>'TrucksregistrationController@Delete','as'=>'api_Trucksregistrationdelete'));
    Route::delete('/Trucksregistration/delete_multiple', array('uses' => 'TrucksregistrationController@DeleteMultiple', 'as' => 'Trucksregistrationdeletemultiple'));
});
