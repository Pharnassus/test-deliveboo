<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name', 50);
            $table->string('slug', 50);
            $table->string('img');
            $table->string('ingredients');
            $table->string('courses');
            $table->text('description', 500);
            $table->float('price', 5,2);
            $table->boolean('visibility');
            $table->timestamps();

            
            //relation
            $table->foreign('restaurant_id')
                ->references('id')   
                ->on('restaurants'); 
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
