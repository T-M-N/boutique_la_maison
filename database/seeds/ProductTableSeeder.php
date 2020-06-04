<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductTableSeeder extends Seeder
{
    public function __construct(Faker\Generator $faker){
        $this->faker = $faker;
    }
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

        Storage::disk('local')->delete(Storage::allFiles());      

       factory(App\Product::class, 6)->create()->each(function($product) {

            $femmes = Storage::disk('faker_images')->files('femmes');
            $hommes = Storage::disk('faker_images')->files('hommes');

            $genre = $this->faker->randomElement(['homme', 'femme']);
            
            if($genre == 'femme'){
                $file = $this->faker->randomElement($femmes);
                $file = Storage::disk('faker_images')->get($file);

                $link = Str::random(40) . '.jpg';
                Storage::put('femmes/'.$link, $file);
                $product->url_image=$link;
                $product->genre='femme';
            }

           if($genre == 'homme'){
                $file = $this->faker->randomElement($hommes);
                $file = Storage::disk('faker_images')->get($file);

                $link = Str::random(40) . '.jpg';
                Storage::put('hommes/'.$link, $file);
                $product->url_image=$link;
                $product->genre='homme';
            }
           
            //category_id
            $categories = ['homme', 'femme'];
            $category = App\Category::where('title',  $categories[rand(0, 1)])->first();
            $product->category()->associate($category);

            $product->save();
       });
        
    }
}
