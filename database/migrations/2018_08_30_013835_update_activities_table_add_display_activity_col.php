<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateActivitiesTableAddDisplayActivityCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->enum('display_activity_at', [
                'show_immediately', 'start_date', '1_week_before_start_date','2_week_before_start_date', 
                '3_week_before_start_date', '4_week_before_start_date'
                ])
                ->default('show_immediately')
                ->nullable()
                ->after('activity_start_date');
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
            $table->dropColumn('display_activity_at');
        });    
    }
}
