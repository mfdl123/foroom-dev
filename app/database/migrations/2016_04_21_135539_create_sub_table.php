<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubTable extends Migration {
	public function up()
	{
		Schema::create('sub',function(Blueprint $table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->text('desc');
			$table->integer('parent_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExist('sub');
	}

}
