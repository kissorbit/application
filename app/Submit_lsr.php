<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Submit_lsr extends Model
{
    protected $table = 'Submit_lsr';
    
    public function select_lsr(){ return $this->belongsTo('App\Lsr', 'select_lsr', 'id');}
    
}
