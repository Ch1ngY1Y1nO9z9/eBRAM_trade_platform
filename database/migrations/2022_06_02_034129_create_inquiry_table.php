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
        Schema::create('inquiry', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer_id')->nullable();
            $table->bigInteger('seller_id')->nullable();
            $table->bigInteger('rfq_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('number')->nullable();
            $table->string('product_name')->nullable();
            $table->string('price')->nullable();
            $table->longText('msg')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('inquiry');
    }
};
