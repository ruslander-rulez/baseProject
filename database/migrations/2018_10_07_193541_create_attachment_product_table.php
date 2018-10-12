<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("attachment_id");
            $table->unsignedInteger("product_id");
            $table->timestamps();


            $table
                ->foreign('attachment_id')
                ->references('id')
                ->on('attachment')
                ->onDelete('cascade');

            $table
                ->foreign('product_id')
                ->references('id')
                ->on('attachment')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachment_product');
    }
}
