<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('buyer_id');
            $table->unsignedBigInteger('statistical_report_id');
            $table->string('payment_method');
            $table->double('report_price',8,2);
            $table->double('buy_price',8,2);
            $table->double('discount',8,2);
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
        Schema::dropIfExists('report_invoices');
    }
};
