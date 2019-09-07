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
            $table->bigIncrements('new_id');
            $table->integer("category_id");
            $table->string("title")->unique();
            $table->string("alias")->unique();
            $table->string("image_intro");
            $table->text("short_description");
            $table->text("full_description");
            $table->integer("publish");
            $table->integer("ordering");
            $table->integer("hot_new");
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
        Schema::dropIfExists('news');
    }
}
