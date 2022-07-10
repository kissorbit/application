<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Trucksregistration extends Model
{
    protected $table = 'Trucksregistration';
    
    public function lsp_name_reference(){ return $this->belongsTo('App\Lsp', 'lsp_name_reference', 'id');}
    
}
