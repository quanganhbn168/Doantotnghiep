<?php

use Illuminate\Database\Seeder;
use App\Models\Contractor;
use Illuminate\Support\Facades\DB;
class ContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contractors')->insert([
        
        		[
                'name'=>'Cty Vận chuyển Gỗ',
                'email'=>'vanchuyengo@example.com',
                
                'password'=>bcrypt('123456'),
                'images'=>'cat12',
                'address'=>'Hoa Quả Sơn',
                'phone'=>'0912345678',
                'website'=>'hoaquason.com',
                'status'=>'1',
                'is_contractor' => 1,
                'approved_at' => now(),
            ],
            [
                'name'=>'Cty Vận Thuỷ sản',
                'email'=>'vanchuyenthuysan@example.com',
                
                'password'=>bcrypt('123456'),
                'images'=>'cat12',
                'address'=>'tây nguyên',
                'phone'=>'0912345679',
                'website'=>'thuysanbacbo.com',
                'status'=>'1',
                'is_contractor' => 1,
                'approved_at' => now(),'status'=>'1',
                'is_contractor' => 1,
                'approved_at' => now(),
            ],
            [
                'name'=>'Cty vận chuyển đồ lạnh',
                'email'=>'vanchuyendolanh@example.com',
                
                'password'=>bcrypt('123456'),
                'images'=>'cat12',
                'address'=>'Hoàng Sa',
                'phone'=>'0912345611',
                'website'=>'GoHoangSa.com',
                'status'=>'1',
                'is_contractor' => 1,
                'approved_at' => now(),
            ]
        
        ]);
    }
}
