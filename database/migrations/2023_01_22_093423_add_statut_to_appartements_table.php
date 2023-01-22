<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatutToAppartementsTable extends Migration
{
    public function up()
    {
        Schema::table('appartements', function (Blueprint $table) {
            $table->boolean('statut')->default(1);
        });
    }

    public function down()
    {
        Schema::table('appartements', function (Blueprint $table) {
            //
        });
    }
}
