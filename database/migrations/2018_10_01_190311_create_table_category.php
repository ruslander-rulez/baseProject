<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->unsignedInteger("thumbnail_id")->nullable()->default(null);
            $table->text("description")->nullable();
            $table->string("seo_title")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->string("seo_description")->nullable();
            $table->string("locale");
            $table->string("slug");
            $table->timestamps();

            $table
                ->foreign('thumbnail_id')
                ->references('id')
                ->on('attachment')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
