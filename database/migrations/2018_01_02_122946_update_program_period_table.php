<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProgramPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_periods', function($table) {
            $table->date('start_date_range')->nullable()->before('created_at')->comment('If date ranges are provided, we will narrow down points data of graph');
            $table->date('end_date_range')->nullable()->after('start_date_range');
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
            $table->dropColumn('start_date_range');
            $table->dropColumn('end_date_range');
        });
    }
}
