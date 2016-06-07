<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	public function up()
	{
		Schema::create('posts',function(Blueprint $table){
			$table->increments('id');
			$table->string('title')->unique();
			$table->text('desc');
			$table->text('content');
			$table->string('content_type');
			$table->integer('sub_id');
			$table->integer('user_id');
			$table->integer('rank');
			$table->boolean('replied');
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
		Schema::dropIfExist('posts');
	}

}
