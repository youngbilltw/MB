<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Topics', function(Blueprint $table ){
            $table->increments('sn');
            $table->integer('gameSn')->unsigned();
            $table->double('totalmoney');
            $table->integer('unitSn')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('Topics', function (Blueprint $table) {

            $table->foreign('gameSn')
                ->references('sn')->on('Games');
            $table->foreign('unitSn')
                ->references('sn')->on('Units');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Topics');
    }
}
