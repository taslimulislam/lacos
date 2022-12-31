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
        Schema::create('s_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('api_key')->nullable();
            $table->string('api_secret')->nullable();
            $table->string('from')->nullable();
            $table->tinyInteger('isinvoice')->default(0)->comment('0 = No , 1 = Yes');
            $table->tinyInteger('isservice')->default(0)->comment('0 = No , 1 = Yes');
            $table->tinyInteger('isreceive')->default(0)->comment('0 = No , 1 = Yes');
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
        Schema::dropIfExists('s_m_s');
    }
};
