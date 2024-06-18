<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelayReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delay_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('vendor_id');
            $table->integer('total_delay')->default(0);
            $table->string('result')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->on('orders')->references('id')->onDelete('NO ACTION')->onUpdate('NO ACTION');
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
        Schema::dropIfExists('delay_reports');
    }
}
