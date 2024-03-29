<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnProContentAndProTitleSeoInTableProducts extends Migration
{
    
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('pro_title_seo')->nullable();
            $table->longText('pro_content')->nullable();
        });
    }

   
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('pro_title_seo','pro_content');
            
        });
    }
}
