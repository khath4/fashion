<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('c_name')->unique();
            $table->string('c_slug')->index();
            $table->integer('c_menu_category_id')->default(0)->index();
            $table->string('c_avatar')->nullable();
            $table->tinyInteger('c_active')->default(1)->index();
            $table->integer('c_total_product')->default(0); 
            $table->string('c_title_seo')->nullable();
            $table->string('c_description_seo')->nullable();
            $table->string('c_keyword_seo')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
