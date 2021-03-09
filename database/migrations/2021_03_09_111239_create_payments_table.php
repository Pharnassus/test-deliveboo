<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('buyer_id');

            $table->string('payment_method', 20);           
            $table->string('status', 20);           
            $table->float('price', 5,2);           
            $table->dateTime('date');           
            // $table->timestamps();

            //relation
            $table->foreign('restaurant_id')
                ->references('id')   
                ->on('restaurants'); 

            //relation
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
        Schema::dropIfExists('payments');
    }
}
