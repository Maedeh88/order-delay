<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedInteger('delivery_time');
            $table->unsignedInteger('new_delivery_time')->default(0);
            $table->timestamps();
            $table->foreign('customer_id')->on('customers')->references('id')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('vendor_id')->on('vendors')->references('id')->onDelete('NO ACTION')->onUpdate('NO ACTION');
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
}
