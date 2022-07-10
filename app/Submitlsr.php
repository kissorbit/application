<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Submitlsr extends Model
{
    protected $table = 'Submitlsr';
    
    public function select_lsr(){ return $this->belongsTo('App\Lsr', 'select_lsr', 'id');}
    
}
