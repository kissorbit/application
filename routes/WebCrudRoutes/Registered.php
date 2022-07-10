<?php
Route::group(['middleware' => ['web', 'auth','permission:Registered']],function(){
    Route::get('/Registered/',array('uses'=>'RegisteredController@Index','as'=>'RegisteredIndex'));
    Route::get('/Registered/list',array('uses'=>'RegisteredController@All','as'=>'Registeredlist'));
    Route::post('/Registered/create_or_update',array('uses'=>'RegisteredController@CreateOrUpdate','as'=>'Registeredcreateorupdate'));
    Route::get('/Registered/edit/{id}',array('uses'=>'RegisteredController@edit','as'=>'Registerededit'));
    Route::post('/Registered/update/{id}',array('uses'=>'RegisteredController@Update','as'=>'Registeredupdate'));
    Route::delete('/Registered/delete/{id}',array('uses'=>'RegisteredController@Delete','as'=>'Registereddelete'));
    Route::delete('/Registered/delete_multiple', array('uses' => 'RegisteredController@DeleteMultiple', 'as' => 'Registereddeletemultiple'));
});
