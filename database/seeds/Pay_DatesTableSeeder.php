<?php

use Illuminate\Database\Seeder;

class Pay_DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pay_dates')->insert([
			'due_date' => DateTime::createFromFormat('m-d-Y', '10-16-2016'),
			'due' => '50.00',
			'total_due' => '50.00'
		]);
        DB::table('pay_dates')->insert([
			'due_date' => DateTime::createFromFormat('m-d-Y', '10-23-2016'),
			'due' => '250.00',
			'total_due' => '300.00'
		]);
        DB::table('pay_dates')->insert([
			'due_date' => DateTime::createFromFormat('m-d-Y', '11-18-2016'),
			'due' => '230.00',
			'total_due' => '530.00'
		]);
        DB::table('pay_dates')->insert([
			'due_date' => DateTime::createFromFormat('m-d-Y', '12-16-2016'),
			'due' => '230.00',
			'total_due' => '760.00'
		]);
        DB::table('pay_dates')->insert([
			'due_date' => DateTime::createFromFormat('m-d-Y', '1-13-2017'),
			'due' => '230.00',
			'total_due' => '990.00'
		]);
        DB::table('pay_dates')->insert([
			'due_date' => DateTime::createFromFormat('m-d-Y', '2-10-2017'),
			'due' => '230.00',
			'total_due' => '1220.00'
		]);
        DB::table('pay_dates')->insert([
			'due_date' => DateTime::createFromFormat('m-d-Y', '3-10-2017'),
			'due' => '30.00',
			'total_due' => '1250.00'
		]);
    }
}
