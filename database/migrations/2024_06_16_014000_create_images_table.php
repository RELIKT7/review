<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::enableForeignKeyConstraints();

    Schema::create('images', function (Blueprint $table) {
      $table->increments('id');
      $table->string('path');
      $table->string('file_name');
      $table->unsignedInteger('review_id');
      $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('images');
  }
}
