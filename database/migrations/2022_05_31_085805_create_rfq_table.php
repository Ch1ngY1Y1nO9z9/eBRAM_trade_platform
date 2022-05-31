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
        Schema::create('rfq', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->string('product_image', 255)->nullable();
            $table->string('product_type', 255)->nullable();
            $table->string('product_name', 255)->nullable();
            $table->string('product_number', 255)->nullable();
            $table->string('unit', 255)->nullable();
            $table->string('total_price', 255)->nullable();
            $table->longText('detail')->nullable();
            $table->string('status', 50)->nullable();
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
        Schema::dropIfExists('rfq');
    }
};
