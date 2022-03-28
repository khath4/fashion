<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('b_name')->unique();
            $table->string('b_slug')->index();
            $table->string('b_avatar')->nullable();
            $table->tinyInteger('b_active')->default(1)->index();
            $table->tinyInteger('b_home')->default(0);
            $table->integer('b_total_product')->default(0); 
            $table->string('b_title_seo')->nullable();
            $table->string('b_description_seo')->nullable();
            $table->string('b_keyword_seo')->nullable();
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
        Schema::dropIfExists('brands');
    }
}
