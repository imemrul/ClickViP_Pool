<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id') 
            ->foreign('user_id')
            ->references('id')
            ->on('users');
            
            // VARCHAR equivalent column with a length.
            $table->string('slug', 255)
            ->unique(); // Index
            
            $table->string('title', 255);  
            $table->string('feature_image', 255);
            // TEXT equivalent column.
            $table->text('post');
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
        Schema::dropIfExists('pages');
    }
}
