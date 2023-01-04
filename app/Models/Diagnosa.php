<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = 'tb_diagnosa';
    protected $guarded = [];
    public function ber(){
    	return $this->belongsTo('App\Models\Berobat');
    }
}
