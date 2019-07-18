<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agreement', 15);
            $table->bigInteger('terminal_id')->unsigned();
            $table->timestamp('uploaded_at')->nullable();
            $table->bigInteger('filial_id')->unsigned();
            $table->bigInteger('payer_id')->unsigned();
            $table->integer('sum');
            $table->timestamps();
        });
        Schema::table('payments', function ($table){
            $table->foreign('terminal_id')->references('id')->on('terminals')->onDelete('cascade');
            $table->foreign('filial_id')->references('id')->on('filials')->onDelete('cascade');
            $table->foreign('payer_id')->references('id')->on('payers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
