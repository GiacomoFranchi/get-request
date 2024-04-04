<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comune extends Model
{
    public $table = 'comuni';
    use HasFactory;
    public $fillable = ['provincia_id', 'nome'];

    public function province(){
        return $this->belongsTo(Provincia::class);
    }
}
