<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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

        
        \DB::table('admins')->insert([
        	'name' => 'Trần Hoàng Kha',
        	'email' => 'tranhoangkha366@gmail.com',
        	'password' => bcrypt('123456')
        ]);
        
        \DB::table('about')->insert([
            'a_email' => 'tranhoangkha366@gmail.com',
            'a_phone' => '0364784406',
            'a_address' =>'Cà Mau',
            'time_open' => 'Từ 8:00 - 17:00',
            'a_description' => 'Công ty TNHH ...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
