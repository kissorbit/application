<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Registered extends Model
{
    protected $table = 'Registered';
    
    public function lsr_select(){ return $this->belongsTo('App\Lsrs', 'lsr_select', 'id');}
    
}
