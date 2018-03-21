<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name'=>'pcnguyen',
            'email'=>'pcnguyenlxag02@gmail.com',
            'password'=>bcrypt(123456),
            'phone'=>'0973588927',
            'address'=>'Long Xuyên, An Giang',
            'level'=>'1',
        ]);
    }
}
