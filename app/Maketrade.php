<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Maketrade extends Model
{
    protected $table = 'Maketrade';
    
    public function trade_lsr_select(){ return $this->belongsTo('App\Submitlsr', 'trade_lsr_select', 'id');}
    
}
