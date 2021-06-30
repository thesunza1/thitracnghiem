<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumorderToExamExamReliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam_relies', function (Blueprint $table) {
            //
            $table->bigInteger('numorder',false,true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_relies', function (Blueprint $table) {
            //
            $table->bigInteger('numorder',false,true);
        });
    }
}
