<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointAdminNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_admin_notes', function(Blueprint $table) {
            $table->increments('id');
            $table->text('admin_notes')->nullable();
            $table->integer('user_id')->unsigned()->nullable()->comment = "Add admin ID who rejected points";
            /*$table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');*/
            $table->integer('point_id')->unsigned()->nullable();
            $table->foreign('point_id')->references('id')
                    ->on('points')->onDelete('cascade');
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
        Schema::dropIfExists('point_admin_notes');
    }
}
