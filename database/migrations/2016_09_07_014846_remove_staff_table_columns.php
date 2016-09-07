<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveStaffTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffmembers', function (Blueprint $table) {
			$table->dropColumn(['image_path', 'bio', 'section', 'subsection']);
			$table->string('conflict_section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staffmembers', function (Blueprint $table) {
            //
        });
    }
}
