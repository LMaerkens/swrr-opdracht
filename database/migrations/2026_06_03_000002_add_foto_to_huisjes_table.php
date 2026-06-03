<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoToHuisjesTable extends Migration
{
    /**
     * Voeg de 'foto' kolom toe aan de huisjes tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('huisjes', function (Blueprint $table) {
            // Sla de bestandsnaam/pad van de foto op
            $table->string('foto')->nullable()->after('beschrijving');
        });
    }

    /**
     * Herstel de migratie.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('huisjes', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
}
