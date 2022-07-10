<?php
Route::group(['middleware' => ['auth','permission:Lsp']],function(){
    Route::get('/Lsp/list',array('uses'=>'LspController@All','as'=>'api_Lsplist'));
    Route::post('/Lsp/create_or_update',array('uses'=>'LspController@CreateOrUpdate','as'=>'api_Lspcreateorupdate'));
    Route::get('/Lsp/edit/{id}',array('uses'=>'LspController@edit','as'=>'api_Lspedit'));
    Route::post('/Lsp/update/{id}',array('uses'=>'LspController@Update','as'=>'api_Lspupdate'));
    Route::delete('/Lsp/delete/{id}',array('uses'=>'LspController@Delete','as'=>'api_Lspdelete'));
    Route::delete('/Lsp/delete_multiple', array('uses' => 'LspController@DeleteMultiple', 'as' => 'Lspdeletemultiple'));
});
