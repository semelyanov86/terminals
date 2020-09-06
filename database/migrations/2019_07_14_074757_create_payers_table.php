<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('onees', 50);
            $table->string('name', 30);
            $table->float('mainsum', 8, 2);
            $table->float('procent', 8, 2);
            $table->float('prosrochka', 8, 2);
            $table->float('chlvz', 8, 2);
            $table->float('full', 8, 2);
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
        Schema::dropIfExists('payers');
    }
}
