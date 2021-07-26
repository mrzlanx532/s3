<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('state')->default(0);
            $table->timestamps();
            $table->string('header');
            $table->timestamp('publish_date');
            $table->text('preview_img');
            $table->string('preview_text');
            $table->integer('views_count');
            $table->text('content');
            $table->string('header_transliteration');

            $table->bigInteger('category_id');
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
