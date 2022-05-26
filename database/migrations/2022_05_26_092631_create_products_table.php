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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('product_name_en')->nullable();
            $table->string('product_name_zh')->nullable();
            $table->string('product_name_cn')->nullable();
            $table->string('model')->nullable();
            $table->string('sku')->nullable();
            $table->string('symbology')->nullable();
            $table->longText('detail_en')->nullable();
            $table->longText('detail_zh')->nullable();
            $table->longText('detail_cn')->nullable();
            $table->integer('unit_price')->nullable();
            $table->string('MOQ')->nullable();
            $table->string('MOV')->nullable();
            $table->string('discount')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->string('mfgr_id')->nullable();
            $table->string('country')->nullable();
            $table->string('safety')->nullable();
            $table->string('spec_url')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
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
        Schema::dropIfExists('products');
    }
};
