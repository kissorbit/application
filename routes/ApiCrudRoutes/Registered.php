<?php
Route::group(['middleware' => ['auth','permission:Registered']],function(){
    Route::get('/Registered/list',array('uses'=>'RegisteredController@All','as'=>'api_Registeredlist'));
    Route::post('/Registered/create_or_update',array('uses'=>'RegisteredController@CreateOrUpdate','as'=>'api_Registeredcreateorupdate'));
    Route::get('/Registered/edit/{id}',array('uses'=>'RegisteredController@edit','as'=>'api_Registerededit'));
    Route::post('/Registered/update/{id}',array('uses'=>'RegisteredController@Update','as'=>'api_Registeredupdate'));
    Route::delete('/Registered/delete/{id}',array('uses'=>'RegisteredController@Delete','as'=>'api_Registereddelete'));
    Route::delete('/Registered/delete_multiple', array('uses' => 'RegisteredController@DeleteMultiple', 'as' => 'Registereddeletemultiple'));
});
