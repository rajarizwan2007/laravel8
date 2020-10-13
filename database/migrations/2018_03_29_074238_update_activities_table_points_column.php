<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateActivitiesTablePointsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('points');
        });
        
        Schema::table('activities', function (Blueprint $table) {
            $table->double('points', 8, 2)->unsigned()->nullable()->default(0.00)->after('activity_end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('points');
        });
        
        Schema::table('activities', function (Blueprint $table) {
            $table->integer('points')->unsigned()->nullable()->default(0)->after('activity_end_date');
        });
    }
}
