<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->integer('id_com');
            $table->integer('id_reg');
            $table->string('description',90);
            $table->enum('status', ['A', 'I', 'trash']);
            $table->foreign('id_reg')->references('id_reg')->on('regions');
            $table->primary(['id_com', 'id_reg']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communes');
    }
}
