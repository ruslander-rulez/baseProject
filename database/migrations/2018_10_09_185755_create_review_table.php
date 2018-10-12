<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("product_id");
            $table->unsignedInteger("attachment_id")->nullable();
            $table->text("text");
            $table->string("name");
            $table->string("city");
            $table->boolean("is_enabled");
            $table->timestamps();

            $table
                ->foreign('product_id')
                ->references('id')
                ->on('product')
                ->onDelete('cascade');

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
        Schema::dropIfExists('review');
    }
}
