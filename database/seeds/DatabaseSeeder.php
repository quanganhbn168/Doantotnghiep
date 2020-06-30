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
        //$this->call(UserSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ContractorSeeder::class);
        $this->call(TendererSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(NewsSeeder::class);
    }
}
