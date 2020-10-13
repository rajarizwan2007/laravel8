<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['waiting_for_admin_approval','admin_viewed','rejected','approved','rejected_and_cannot_resubmit','approved_and_archived','rejected_and_archived'])->default('waiting_for_admin_approval')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            /*$table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');*/
            $table->integer('program_period_id')->unsigned()->nullable();
            $table->foreign('program_period_id')->references('id')
                    ->on('program_periods')->onDelete('cascade');
            $table->integer('activity_id')->unsigned()->nullable();
            $table->foreign('activity_id')->references('id')
                    ->on('activities')->onDelete('cascade');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')
                    ->on('organizations')->onDelete('cascade');
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
        Schema::dropIfExists('points');
    }
}
