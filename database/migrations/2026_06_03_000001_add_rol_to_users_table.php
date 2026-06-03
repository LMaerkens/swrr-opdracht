<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolToUsersTable extends Migration
{
    /**
     * Voeg de 'rol' kolom toe aan de users tabel.
     * Standaard is elke gebruiker een gewone 'user'.
     * Een admin krijgt de waarde 'admin'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rol kolom met standaard waarde 'user'
            $table->string('rol', 20)->default('user')->after('password');
        });
    }

    /**
     * Herstel de migratie.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
        });
    }
}
