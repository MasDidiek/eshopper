<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('checkout_id');
            $table->text('product_name');
            $table->integer('harga_satuan');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->string('product_image');
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
        Schema::dropIfExists('checkout_detail');
    }
}
