<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(userSeeder::class);

    }
}

// Tự tạo class

class userSeeder extends Seeder
{   //Trong ngoặc vuông [] là mảng 1 chiều . [[]] : là mảng 2 chiều
    public function run(){
        DB::table('users')->insert([
            ['name' =>'Tien', 'email' =>'tien1@gmail.com', 'password' => bcrypt('123456')],
            ['name' =>'kubi', 'email' =>'tien2@gmail.com', 'password' => bcrypt('123456')],
            ['name' =>'kubo', 'email' =>'tien3@gmail.com', 'password' => bcrypt('123456')]
        ]);
    }
}
