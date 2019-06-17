<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersDerails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
			$table->string('phone');
			$table->string('address');
			$table->string('status');
			$table->string('pesel');
			$table->string('type');
		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('user',function(Blueprint $table){
        $table->dropColumn('phone');
			$table->dropColumn('address');
			$table->dropColumn('status');
			$table->dropColumn('pesel');
			$table->dropColumn('type');
		
		
		});
    }
}
