<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->integer('qty');
            $table->integer('price');
            // $table->integer('distributor_id');
            // $table->integer('merek_id');
            // $table->bigInteger('distributor_id')->unsigned();
            // $table->foreign('distributor_id')->references('id')->on('distributors');
            // $table->bigInteger('merek_id')->unsigned();
            // $table->foreign('merek_id')->references('id')->on('mereks');
            $table->integer('purchase_price');
            $table->date('tanggal_masuk');
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
        Schema::dropIfExists('product');
    }
}
