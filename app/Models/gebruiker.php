<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gebruiker extends Model
{
    use HasFactory;
    public  $id;
    public $voornaam;
    public $achternaam;
    public $email;
    public $lidmaatschap;

    public function rol()
    {
        return $this->hasOne(rol::class);
    }
}
