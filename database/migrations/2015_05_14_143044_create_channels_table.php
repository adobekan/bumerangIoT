<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('channels', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('device_id')->unsigned();
            $table->string('description',60);
            $table->integer('data_type')->unsigned();
            $table->timestamps();

            $table->engine='InnoDB';

            $table->foreign('device_id')
                ->references('id')
                ->on('devices')
                ->onDelete('cascade');

            $table->foreign('data_type')
                ->references('id')
                ->on('data_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('channels');
	}

}
