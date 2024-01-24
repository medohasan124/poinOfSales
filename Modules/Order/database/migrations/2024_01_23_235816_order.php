<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->OnDelete('cascade');

            $table->unsignedBigInteger('client_id')->default(1);
            $table->foreign('client_id')->references('id')->on('clients')->OnDelete('cascade');

            $table->double('discount');
            $table->double('salary');
            $table->double('lastSalary');
            $table->integer('payment')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
