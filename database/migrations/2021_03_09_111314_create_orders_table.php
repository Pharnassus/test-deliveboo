<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('buyer_id');
            $table->dateTime('order_date');

            $table->timestamps();

            //relation
            $table->foreign('restaurant_id')
                ->references('id')   
                ->on('restaurants'); 
            
            $table->foreign('buyer_id')
                ->references('id')   
                ->on('buyers');             
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
