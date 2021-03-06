<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments',function(Blueprint $table){
			$table->increments('id');
			$table->integer('post_id');
			$table->text('desc');
			$table->text('content');
			$table->integer('user_id');
			$table->integer('rank');
			$table->integer('parent_id');
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
		Schema::dropIfExist('comments');
	}

}
