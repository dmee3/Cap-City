<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffmembers', function (Blueprint $table) {
			$table->string('section');
			$table->string('subsection');
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
