<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProgramPeriodCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_period_categories', function($table) {
            $table->string('font_color')->nullable()->after('soft_deleted');
            $table->text('description')->nullable()->after('font_color');
            $table->string('point_goal')->nullable()->after('description');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_period_categories', function($table) {
            $table->dropColumn('font_color');
            $table->dropColumn('description');
            $table->dropColumn('point_goal');
        });
    }
}
