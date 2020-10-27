<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('product_id')->nullable();
            $table->integer('in')->nullable();
            $table->integer('out')->nullable();
            $table->string('date')->nullable();      
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
        Schema::dropIfExists('stockchanges');
    }
}
