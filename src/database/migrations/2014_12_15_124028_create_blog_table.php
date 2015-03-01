<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function($table)
                {
                    $table->increments('id');
                    $table->string('title',256);
                    $table->string('image',256);
                    $table->string('author',256);
                    $table->longText('content');
                    $table->bigInteger('socialPoint');
                    $table->boolean('public');
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
            Schema::drop('blog');
	}

}
