<?php

use Illuminate\Database\Seeder;
use App\Models\News;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(News::class,20)->create();
    }
}
