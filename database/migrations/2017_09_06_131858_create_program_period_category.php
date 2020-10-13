<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramPeriodCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_period_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('program_period_id')->unsigned()->nullable();
            $table->foreign('program_period_id')->references('id')
                    ->on('program_periods')->onDelete('cascade');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')
                    ->on('organizations')->onDelete('cascade');
            $table->tinyInteger('soft_deleted')->unsigned()->nullable();
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
        Schema::dropIfExists('program_period_categories');
    }
}
