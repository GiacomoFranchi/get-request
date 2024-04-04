<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Richiesta extends Model
{
    use HasFactory;
    protected $table = 'richieste';
    public $fillable = ['nome', 'cognome', 'data_di_nascita', 'provincia', 'nome_comune', 'richiesta'];
}
