<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('resturant_id')->constrained('resturants','id')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories','id')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->double('price');
            $table->double('discount')->default(0);
            $table->string('image')->nullable();
            $table->integer('count_buy')->default(0);
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
        Schema::dropIfExists('meals');
    }
};
