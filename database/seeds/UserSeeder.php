<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>'Trần Quang Anh',
        	'email'=>'admin@admin.com',
        	'email_verified_at'=>now(),
        	'password'=>bcrypt('123456'),
        	'is_admin'=>true,
        	'created_at'=>now(),
        	'updated_at'=>now()
        ]);
    }
}
