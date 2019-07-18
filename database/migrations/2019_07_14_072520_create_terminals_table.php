<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20)->unique();
            $table->string('display_name', 50);
            $table->string('category', 50);
            $table->string('password');
            $table->enum('active', [0, 1])->default(0);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamp('auth_date')->nullable();
            $table->enum('notifications', [0,1])->default(0);
            $table->string('tmp_pass')->nullable();
            $table->string('inkasso_pass')->nullable();
            $table->longText('description')->nullable();
            $table->string('cashmashine')->nullable();
            $table->string('printer')->nullable();
            $table->string('log_path')->nullable();
            $table->string('modem')->nullable();
            $table->timestamps();
        });
        Schema::table('terminals', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminals');
    }
}
