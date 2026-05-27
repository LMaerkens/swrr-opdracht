<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huisje extends Model
{
    use HasFactory;

    protected $table = 'huisjes';

    protected $fillable = [
        'naam',
        'locatie',
        'prijs',
        'periode',
        'beschrijving',
        'slaapplaatsen'
    ];
}