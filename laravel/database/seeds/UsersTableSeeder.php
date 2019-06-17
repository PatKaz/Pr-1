<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			'name'=>'Patryk Kaźmierczak',
			'email'=>'patryk.kazmierczak92@gmail.com',
			'password'=>bcrypt('password'),
			'phone'=>512878259,
			'address'=>"Gro 18 Gdańsk",
			'status'=>'Active',
			'pesel'=>'92040604118',
			'type'=>'admin'
			
		
		]);
		
		
			
			
    }
}
