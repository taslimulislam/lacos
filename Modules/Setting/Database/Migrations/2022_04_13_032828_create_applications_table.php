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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id')->nullable();
            $table->integer('currency_id');
            $table->string('title');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('tax_no')->nullable();
            $table->tinyInteger('rtl_ltr')->default(1)->comment('1=LTR,2=RTL');
            $table->string('footer_text');
            $table->string('logo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
