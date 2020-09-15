<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnaPruebaTest3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ASI SE BORRAN COLUMNAS
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('columna_prueba');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            Schema::dropIfExists('expenses');
        });
    }
}
