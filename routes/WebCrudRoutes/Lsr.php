<?php
Route::group(['middleware' => ['web', 'auth','permission:Lsr']],function(){
    Route::get('/Lsr/',array('uses'=>'LsrController@Index','as'=>'LsrIndex'));
    Route::get('/Lsr/list',array('uses'=>'LsrController@All','as'=>'Lsrlist'));
    Route::post('/Lsr/create_or_update',array('uses'=>'LsrController@CreateOrUpdate','as'=>'Lsrcreateorupdate'));
    Route::get('/Lsr/edit/{id}',array('uses'=>'LsrController@edit','as'=>'Lsredit'));
    Route::post('/Lsr/update/{id}',array('uses'=>'LsrController@Update','as'=>'Lsrupdate'));
    Route::delete('/Lsr/delete/{id}',array('uses'=>'LsrController@Delete','as'=>'Lsrdelete'));
    Route::delete('/Lsr/delete_multiple', array('uses' => 'LsrController@DeleteMultiple', 'as' => 'Lsrdeletemultiple'));
});
