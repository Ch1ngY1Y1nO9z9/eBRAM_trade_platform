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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usr_id')->nullable();
            $table->string('tel', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('website', 1000)->nullable();
            $table->string('social', 1000)->nullable();
            $table->string('address_en', 1000)->nullable();
            $table->string('address_zh', 1000)->nullable();
            $table->string('address_cn', 1000)->nullable();
            $table->string('zip_code', 1000)->nullable();
            $table->string('city', 1000)->nullable();
            $table->string('detail', 1000)->nullable();
            $table->string('tax_code', 1000)->nullable();
            $table->string('status', 1000)->nullable();
            $table->string('bill_address_en', 1000)->nullable();
            $table->string('bill_address_zh', 1000)->nullable();
            $table->string('bill_address_cn', 1000)->nullable();
            $table->string('delivery_address_en', 1000)->nullable();
            $table->string('delivery_address_zh', 1000)->nullable();
            $table->string('delivery_address_cn', 1000)->nullable();
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
        Schema::dropIfExists('account');
    }
};
