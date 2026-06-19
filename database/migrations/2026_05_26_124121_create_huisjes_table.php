<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuisjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huisjes', function (Blueprint $table) {
            $table->id();

            $table->string('naam', 45);
            $table->string('locatie', 45)->nullable();
            $table->decimal('prijs', 10, 2);
            $table->string('periode', 45)->nullable();
            $table->text('beschrijving')->nullable();
            $table->integer('aantal');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('huisjes');
    }
}
