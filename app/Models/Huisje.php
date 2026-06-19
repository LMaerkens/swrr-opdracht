<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huisje extends Model
{
    use HasFactory;

    /**
     * De database tabel die dit model gebruikt.
     *
     * @var string
     */
    protected $table = 'huisjes';

    /**
     * De velden die mass-assignable zijn.
     * Dit zijn alle velden die via create() of fill() ingevuld mogen worden.
     *
     * @var array
     */
    protected $fillable = [
        'naam',        // Naam van het huisje
        'locatie',     // Locatie/adres
        'prijs',       // Prijs per periode
        'periode',     // Bijv. "per nacht", "per week"
        'beschrijving',// Omschrijving van het huisje
        'aantal',      // Maximaal aantal personen
        'foto',        // Bestandsnaam van de hoofdfoto
        'fotos',       // Extra foto's (JSON array)
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'fotos' => 'array',
    ];
}
