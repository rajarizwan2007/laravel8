<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProgramPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_periods', function($table) {
            $table->enum('progress_display', ['yes', 'no'])->default('no')->nullable()
                    ->after('organization_id');
            $table->enum('display_options', ['activity_points_only', 'milestones_only', 'both'])
                   ->default('activity_points_only')
                   ->nullable()
                   ->after('progress_display');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_periods', function($table) {
            $table->dropColumn('progress_display');
            $table->dropColumn('display_options');
            $table->dropColumn('graph_title');
            $table->dropColumn('graph_font_color');
            $table->dropColumn('graph_subtitle');
            $table->dropColumn('subtitle_font_color');
            $table->dropColumn('bar_color');
            $table->dropColumn('total_point_goal');
        });
    }
}
