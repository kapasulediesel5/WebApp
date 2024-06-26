<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create(
			'content',
			function ( Blueprint $table ) {
				$table->id();
				$table->string( 'header' );
				$table->string( 'description' );
				$table->string( 'image1' );
				$table->string( 'image2' );
				$table->text( 'who_we_are' );
				$table->text( 'our_vision' );
				$table->text( 'our_history' );
				$table->timestamps();
			}
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'content' );
	}
};
