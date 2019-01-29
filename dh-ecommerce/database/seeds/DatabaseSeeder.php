<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class)->times(5)->create();
        // $product = factory(Product::class)->times(5)->create();
      
        foreach ($categories as $category) {
            factory(Product::class)->times(3)->create([
                'category_id' => $category->id
            ]);
        }

        $this->call([
            UsersTableSeeder::class,
        ]);
    }
}
