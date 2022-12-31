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
        Schema::create('start_ups', function (Blueprint $table) {

            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('name',56);
            $table->text('description')->nullable();
            $table->string('address',512)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('no_of_employees',11)->nullable();
            $table->year('year_launched')->nullable();
            $table->string('industry',256)->nullable();
            $table->string('market_segment')->nullable();
            $table->string('funding_stage')->nullable();
            $table->text('about');
            $table->string('web_link',512)->nullable();
            $table->string('fb_link',512)->nullable();
            $table->string('twitter_link',512)->nullable();
            $table->string('insta_link',512)->nullable();
            $table->string('linkedIn_link',512)->nullable();
            $table->string('news_post_id')->nullable();
            $table->string('deal')->nullable();
            $table->double('fund_raied_amount',10,2)->nullable();
            $table->string('product_stage')->nullable();
            $table->string('logo',256)->nullable();
            $table->integer('product_stage_id')->nullable();
            $table->updateCreatedBy();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('country_id')->references('id')->on('countries');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('start_ups');
    }
};
