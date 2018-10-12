<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdvice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advice', function (Blueprint $table) {
            $table->increments('id');
            $table->text("short_text")->nullable();
            $table->text("full_text")->nullable();
            $table->unsignedInteger("attachment_id")->nullable();
            $table->string("title")->nullable();
            $table->string("slug")->index();
            $table->string("seo_title")->nullable();
            $table->string("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->tinyInteger("is_publish");
            $table->tinyInteger("is_show_on_front");
            $table->string("locale");
            $table->timestamps();

            $table->unique(["slug", "locale"]);

            $table
                ->foreign('attachment_id')
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
        Schema::table("advice", function (Blueprint $table) {
            $table->dropForeign('advice_attachment_id_foreign');
        });
        Schema::dropIfExists('advice');
    }
}
