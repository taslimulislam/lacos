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
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('company_name');
            $table->unsignedBigInteger('industry_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('investor_types_id');
            $table->unsignedBigInteger('investment_stage_id');
            $table->unsignedBigInteger('exits_id');
            $table->string('about')->nullable();
            $table->string('web_link')->nullable();
            $table->year('year_founded')->nullable();
            $table->string('logo')->nullable();
            $table->updateCreatedBy();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('investor_types_id')->references('id')->on('investor_types');
            $table->foreign('investment_stage_id')->references('id')->on('investment_stages');
            $table->foreign('exits_id')->references('id')->on('investment_exits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investors');
    }
};
