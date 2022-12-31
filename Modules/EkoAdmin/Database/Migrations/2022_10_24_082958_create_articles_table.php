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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('title');
            $table->text('description');
            $table->tinyInteger('patented_status')->default(0)->comment('1 = patented, 0 = not patented');
            $table->tinyInteger('publish_status')->default(0)->comment('1 = approve, 0 = pending, 2 = decline');
            $table->string('views_count')->nullable();
            $table->tinyInteger('deleted_status')->default(0)->comment('1 = deleted, 0 = not deleted');
            $table->string('uploaded_article_url')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
