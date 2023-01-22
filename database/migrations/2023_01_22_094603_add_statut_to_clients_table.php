<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatutToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('statut')->default(1);
        });
    }
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
