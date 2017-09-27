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
        $user =App\User::create([
            'name'=>'foo',
            'email'=>'foo@yahoo.com',
            'password'=>bcrypt('123456'),
            'admin'=>1

        ]);
      
        App\Profile::create([   
          'user_id'=> $user->id,
          'avatar'=>'upload/avatar/1.png',
          
          'about'=>'about me abloy me crazy about me abloy me crazy',
          'facebook'=>'facebook.com',
          'youtube'=>'youtube.com'
        ]);
    }

}