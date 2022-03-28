<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
 
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('ct_name')->nullable();
            $table->string('ct_email')->nullable();
            $table->string('ct_phone')->nullable();
            $table->string('ct_title')->nullable();
            $table->string('ct_content')->nullable();
            $table->tinyInteger('ct_status')->default(0);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
