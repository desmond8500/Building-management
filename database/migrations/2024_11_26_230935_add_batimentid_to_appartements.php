<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBatimentidToAppartements extends Migration
{

    public function up()
    {
        Schema::table('appartements', function (Blueprint $table) {
            $table->integer('batiment_id')->constrained()->default(1);
        });
    }

    public function down()
    {
        Schema::table('appartements', function (Blueprint $table) {
            //
        });
    }
}
