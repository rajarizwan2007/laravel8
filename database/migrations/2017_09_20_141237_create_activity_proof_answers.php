<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityProofAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_proof_answers', function(Blueprint $table) {
            $table->increments('id');
            $table->text('answer')->nullable();            
            $table->integer('user_id')->unsigned()->nullable();
            /*$table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');*/
            $table->integer('activity_proof_id')->unsigned()->nullable();
            $table->foreign('activity_proof_id')->references('id')
                    ->on('activity_proofs')->onDelete('cascade');  
            $table->integer('point_id')->unsigned()->nullable();
            $table->foreign('point_id')->references('id')
                    ->on('points')->onDelete('cascade');  
            $table->integer('activity_id')->unsigned()->nullable();
            $table->foreign('activity_id')->references('id')
                    ->on('activities')->onDelete('cascade');
            $table->integer('program_period_id')->unsigned()->nullable();
            $table->foreign('program_period_id')->references('id')
                    ->on('program_periods')->onDelete('cascade');
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
        Schema::dropIfExists('activity_proof_answers');
    }
}
