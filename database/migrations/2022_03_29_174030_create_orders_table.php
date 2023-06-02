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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('meal_id')->nullable()->constrained('meals')->nullOnDelete();
            $table->foreignId('resturant_id')->nullable()->constrained('resturants')->nullOnDelete();
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedFloat('price');
            $table->string('name');
            $table->string('mobile');
            $table->unsignedFloat('total')->default(0);
            $table->enum('status', ['pending', 'cancelled', 'processing', 'shipped', 'completed'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'refund'])->default('unpaid');
            $table->string('address');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
