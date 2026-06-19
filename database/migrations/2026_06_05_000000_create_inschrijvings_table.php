<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inschrijvings', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('adres');
            $table->string('postcode');
            $table->string('telefoon')->nullable();
            $table->string('email');
            $table->integer('personen')->default(1);
            $table->string('ben_je_lid')->nullable();
            $table->string('lidnummer')->nullable();
            $table->string('holiday')->nullable();
            $table->string('type_verblijf')->nullable();
            $table->string('keus1_van')->nullable();
            $table->string('keus1_tot')->nullable();
            $table->string('keus2_van')->nullable();
            $table->string('keus2_tot')->nullable();
            $table->string('huisje')->nullable();
            $table->text('toelichting')->nullable();
            $table->boolean('akkoord')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inschrijvings');
    }
};
