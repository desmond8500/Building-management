<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefToCompteursTable extends Migration
{

    public function up()
    {
        Schema::table('compteurs', function (Blueprint $table) {
            $table->string('ref_client')->nullable();
            $table->string('ref_compteur')->nullable();
            $table->string('adresse_technique')->nullable();
            $table->string('numero_facture')->nullable();
        });
    }

    public function down()
    {
        Schema::table('compteurs', function (Blueprint $table) {
            //
        });
    }
}
