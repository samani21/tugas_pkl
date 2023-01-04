<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokobat extends Model
{
    use HasFactory;
    protected $table = 'tb_obat';
    protected $guarded = [];
}
