<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('activities', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('link_label')->nullable();
            $table->string('link_url')->nullable();
            $table->text('description')->nullable();
            $table->date('activity_start_date')->nullable();
            $table->date('activity_end_date')->nullable();
            $table->integer('points')->unsigned()->nullable(); 
            $table->date('points_start_date')->nullable();
            $table->date('points_end_date')->nullable();
            $table->integer('number_of_times_collect')->unsigned()->nullable();
            $table->integer('manual_only')->unsigned()->nullable();
            $table->text('manual_only_note')->nullable();
            $table->integer('program_period_category_id')->unsigned()->nullable();
            $table->foreign('program_period_category_id')->references('id')
                    ->on('program_period_categories')->onDelete('cascade');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')
                    ->on('organizations')->onDelete('cascade');
            $table->integer('soft_deleted')->unsigned()->nullable();
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
        Schema::dropIfExists('activities');
    }
}
