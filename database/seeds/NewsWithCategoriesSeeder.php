<?php

use Illuminate\Database\Seeder;

class NewsWithCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Categories::class, 3)->create()->each(function ($category) {
            factory(App\Model\News::class, 20)->create(['category_id' => $category->id]);
        });
    }
}
