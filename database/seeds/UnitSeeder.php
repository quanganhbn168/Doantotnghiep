<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
        	[
        		'name'=>'Kg',
        		
        	],
        	[
        		'name'=>'Tấn',
        		
        	],
        	[
        		'name'=>'Tạ',
        		
        	],
        	[
        		'name'=>'Yến',
        		
        	],
        	[
        		'name'=>'Thùng',
        		
        	],
        	
        ]);
    }
}
