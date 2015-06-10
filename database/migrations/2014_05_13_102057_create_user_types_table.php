<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_types', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('type',40);
			$table->timestamps();
		});

        //Populate user_types table
        DB::table('user_types')->insert(array(
            array('type'=>'Regular'),
            array('type'=>'Administrator'),
        ));


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_types');
	}

}
