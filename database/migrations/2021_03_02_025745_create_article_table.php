<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
  
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('a_name')->nullable()->unique();
            $table->string('a_slug')->index();
            $table->string('a_description')->nullable();
            $table->longText('a_content')->nullable();
            $table->tinyInteger('a_active')->index()->default(1);
            $table->integer('a_author_id')->index()->default(0);
            $table->string('a_avatar')->nullable();
            $table->integer('a_view')->default(0);
            $table->string('a_title_seo')->nullable();
            $table->string('a_description_seo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article');
    }
}