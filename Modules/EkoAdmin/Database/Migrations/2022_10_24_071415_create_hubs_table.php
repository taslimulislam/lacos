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
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('num_of_investment');
            $table->unsignedBigInteger('industry_id');
            $table->unsignedBigInteger('country_id');
            $table->text('about')->nullable();
            $table->string('web_link')->nullable();
            $table->string('address')->nullable();
            $table->year('year_launched')->nullable();
            $table->string('logo')->nullable();
            $table->updateCreatedBy();
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
        Schema::dropIfExists('hubs');
    }
};
