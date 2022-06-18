<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('dni',45);
            $table->integer('id_reg');
            $table->integer('id_com');
            $table->string('email',120);
            $table->string('name',45);
            $table->string('last_name',45);
            $table->string('address',255)->nullable();
            $table->dateTime('date_reg');
            $table->enum('status', ['A', 'I', 'trash']);
            $table->foreign('id_reg')->references('id_reg')->on('regions');
            $table->foreign('id_com')->references('id_com')->on('communes');
            $table->primary(['dni', 'id_reg', 'id_com']);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
