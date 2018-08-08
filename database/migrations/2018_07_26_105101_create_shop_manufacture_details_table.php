<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopManufactureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_manufacture_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shop_id')->index();
            $table->unsignedInteger('manufacture_id')->index();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->boolean('is_active');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('manufacture_id')->references('id')->on('manufactures')->onDelete('cascade');
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
        Schema::dropIfExists('shop_manufacture_details');
    }
}
