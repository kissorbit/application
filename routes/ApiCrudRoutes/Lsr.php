<?php
Route::group(['middleware' => ['auth','permission:Lsr']],function(){
    Route::get('/Lsr/list',array('uses'=>'LsrController@All','as'=>'api_Lsrlist'));
    Route::post('/Lsr/create_or_update',array('uses'=>'LsrController@CreateOrUpdate','as'=>'api_Lsrcreateorupdate'));
    Route::get('/Lsr/edit/{id}',array('uses'=>'LsrController@edit','as'=>'api_Lsredit'));
    Route::post('/Lsr/update/{id}',array('uses'=>'LsrController@Update','as'=>'api_Lsrupdate'));
    Route::delete('/Lsr/delete/{id}',array('uses'=>'LsrController@Delete','as'=>'api_Lsrdelete'));
    Route::delete('/Lsr/delete_multiple', array('uses' => 'LsrController@DeleteMultiple', 'as' => 'Lsrdeletemultiple'));
});
