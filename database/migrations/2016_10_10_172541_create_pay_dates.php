<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_dates', function (Blueprint $table) {
            $table->increments('id');
			$table->date('due_date');
			$table->decimal('due', 7, 2);
			$table->decimal('total_due', 7, 2);
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
        Schema::drop('pay_dates');
    }
}
