<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::insert([
            ['title' => 'homme'],
            ['title' => 'femme'],
        ]);

        factory(App\Product::class, 10)->create()->each(function($product) {

            $titles = ['homme', 'femme'];

            $category = App\Category::where('title', $titles[rand(0, 2)])->first();

            $category->category()->associate($category);

            $category->save();
        });
    }
}
