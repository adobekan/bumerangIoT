<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',60);
            $table->string('username',20)->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->string('accessKey',60);
            $table->integer('level')->unsigned();
			$table->rememberToken();
			$table->timestamp('registration');
            $table->timestamps();

            $table->engine='InnoDB';

            $table->foreign('level')
                ->references('id')
                ->on('user_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
