<?php

use Illuminate\Database\Seeder;
use App\Models\Tenderer;
class TendererSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Tenderers')->insert(
                [
                    [
                'name'=>'Cty Hoa Quả Sơn',
                'email'=>'hoaquason@example.com',
                
                'password'=>bcrypt('123456'),
                'images'=>'cat12',
                'address'=>'Hoa Quả Sơn',
                'phone'=>'0912345678',
                'website'=>'hoaquason.com',
                'status'=>'1',
                'is_tenderer' => 1,
                'approved_at' => now(),
            ],
            [
                'name'=>'Cty Thuỷ sản Vịnh Bắc Bộ',
                'email'=>'thuysanbacbo@example.com',
                
                'password'=>bcrypt('123456'),
                'images'=>'cat12',
                'address'=>'tây nguyên',
                'phone'=>'0912345679',
                'website'=>'thuysanbacbo.com',
                'status'=>'1',
                'is_tenderer' => 1,
                'approved_at' => now(),
            ],
            [
                'name'=>'Cty Gỗ Sản xuất Hoàng Sa',
                'email'=>'Gohoangsa@example.com',
                
                'password'=>bcrypt('123456'),
                'images'=>'cat12',
                'address'=>'Hoàng Sa',
                'phone'=>'0912345611',
                'website'=>'GoHoangSa.com',
                'status'=>'1',
                'is_tenderer' => 1,
                'approved_at' => now(),
            ]
                ]);
            
    }
}
