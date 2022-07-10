<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Submitlsp extends Model
{
    protected $table = 'Submitlsp';
    
    public function lsp_name_reference(){ return $this->belongsTo('App\Lsp', 'lsp_name_reference', 'id');}
    
}
