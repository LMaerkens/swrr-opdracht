<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inschrijving extends Model
{
    use HasFactory;

    protected $table = 'inschrijvings';

    protected $fillable = [
        'naam', 'adres', 'postcode', 'telefoon', 'email', 'personen',
        'ben_je_lid', 'lidnummer', 'holiday', 'type_verblijf',
        'keus1_van', 'keus1_tot', 'keus2_van', 'keus2_tot',
        'huisje', 'toelichting', 'akkoord'
    ];
}
