<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['category' => 'Development']);
        Category::create(['category' => 'Business']);
        Category::create(['category' => 'Finance Accounting']);
        Category::create(['category' => 'IT Software']);
        Category::create(['category' => 'Office Productivity']);
        Category::create(['category' => 'Personal Development']);
        Category::create(['category' => 'Design']);
        Category::create(['category' => 'Marketing']);
        Category::create(['category' => 'Lifestyle']);
        Category::create(['category' => 'Photography']);
        Category::create(['category' => 'Health Fitness']);
        Category::create(['category' => 'Music']);

    }
}
