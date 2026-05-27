<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gebruiker extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public  $id;
    public $voornaam;
    public $achternaam;
    public $email;
    public $lidmaatschap;

=======
    public $id;
    public $lidmaatschaps;
    public $voornaam;
    public $achternaam;
    public $email;
    public $nowin;
    
>>>>>>> 3e538de8701e8cfa14ec4e3b297c80f3395281d2
    public function rol()
    {
        return $this->hasOne(rol::class);
    }
<<<<<<< HEAD
=======

>>>>>>> 3e538de8701e8cfa14ec4e3b297c80f3395281d2
}
