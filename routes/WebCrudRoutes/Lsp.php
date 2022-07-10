<?php
Route::group(['middleware' => ['web', 'auth','permission:Lsp']],function(){
    Route::get('/Lsp/',array('uses'=>'LspController@Index','as'=>'LspIndex'));
    Route::get('/Lsp/list',array('uses'=>'LspController@All','as'=>'Lsplist'));
    Route::post('/Lsp/create_or_update',array('uses'=>'LspController@CreateOrUpdate','as'=>'Lspcreateorupdate'));
    Route::get('/Lsp/edit/{id}',array('uses'=>'LspController@edit','as'=>'Lspedit'));
    Route::post('/Lsp/update/{id}',array('uses'=>'LspController@Update','as'=>'Lspupdate'));
    Route::delete('/Lsp/delete/{id}',array('uses'=>'LspController@Delete','as'=>'Lspdelete'));
    Route::delete('/Lsp/delete_multiple', array('uses' => 'LspController@DeleteMultiple', 'as' => 'Lspdeletemultiple'));
});
