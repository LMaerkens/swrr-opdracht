<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gebruiker extends Model
{
    use HasFactory;

    protected $fillable = [
        'voornaam',
        'achternaam',
        'email',
        'lidmaatschap',
    ];

    public function rol()
    {
        return $this->hasOne(rol::class);
    }
}
