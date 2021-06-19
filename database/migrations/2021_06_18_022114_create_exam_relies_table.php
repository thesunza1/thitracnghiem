<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamReliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_relies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('examQuestion_id',false,true);
            $table->bigInteger('rely_id',false,true);
            $table->integer('choose')->default(0);
            $table->integer('order')->default(0);
            $table->foreign('examQuestion_id')->references('id')->on('exam_questions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rely_id')->references('id')->on('relies')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_relies');
    }
}
