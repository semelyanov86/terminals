<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncassationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incassations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('amount');
            $table->integer('quantity');
            $table->bigInteger('terminal_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('incassations', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('terminal_id')->references('id')->on('terminals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incassations');
    }
}
