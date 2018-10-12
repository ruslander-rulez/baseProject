<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("vendor_code");
            $table->boolean("show_on_front")->default(false);
            $table->unsignedInteger("thumbnail_id")->nullable();
            $table->unsignedInteger("category_id")->nullable();
            $table->string("made_in")->nullable();
            $table->unsignedInteger("made_in_ico_id")->nullable();
            $table->string("locale");
            $table->string("slug");
            $table->string("seo_title")->nullable();
            $table->string("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->text("description")->nullable();
            $table->string("short_description")->nullable();
            $table->timestamps();

            $table
                ->foreign('thumbnail_id')
                ->references('id')
                ->on('attachment')
                ->onDelete('set null');

            $table
                ->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('set null');

            $table
                ->foreign('made_in_ico_id')
                ->references('id')
                ->on('attachment')
                ->onDelete('set null');

            $table->unique(["locale", "slug"]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
