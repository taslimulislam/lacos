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
        Schema::create('statistical_reports', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('name');
            $table->longText('price');
            $table->string('report_image')->nullable();
            $table->text('report_doc')->nullable();
            $table->text('about_report')->nullable();
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
        Schema::dropIfExists('statistical_reports');
    }
};
