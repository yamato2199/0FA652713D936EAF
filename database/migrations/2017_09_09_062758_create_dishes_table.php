<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {

            $table->increments('id');
            $table->string('dishName');
            $table->text('dishPic');
            $table->text('dishDes');
            $table->double('price');
            $table->integer('shop_id')->unsigned();
            //$table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->boolean('avaible')->default(1);
            
            $table->timestamps();
        });

        Schema::table('dishes', function($table) {
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
