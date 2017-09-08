<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cont_street_number');
            $table->string('cont_street');
            $table->string('cont_city');
            $table->string('cont_state');
            $table->string('cont_zipcode');
            $table->string('cont_country');
            $table->string('cont_phone');
            $table->string('cont_firstname');
            $table->string('cont_lastname');
            $table->boolean('cont_gender');
            $table->boolean('cont_isdefault');
            $table->integer('user_id');
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
        Schema::dropIfExists('contacts');
    }
}
