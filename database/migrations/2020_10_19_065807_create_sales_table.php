<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');    
            $table->string('inv_no')->nullable();
            $table->tinyInteger('customer_id')->nullable();
            $table->string('date')->nullable();
            $table->integer('num_of_category')->nullable();
            $table->integer('total_discount')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('status')->nullable();
            $table->integer('action_by')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
