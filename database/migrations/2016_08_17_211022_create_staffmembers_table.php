<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffmembers', function (Blueprint $table) {

			$table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('position');
			$table->string('image_path');
			$table->string('bio');
			$table->decimal('pay', 7, 2);
            $table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staffmembers');
    }
}
