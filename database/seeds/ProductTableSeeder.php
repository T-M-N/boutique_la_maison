<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

            // Gestion des images on maitrise le nom de l'image pour éviter les problèmes d'injection de script dans les noms 
            // des fichiers.
            $link = Str::random(40) . '.jpg';
            // on récupère les octets d'une image distante avec file_get_content
            $file = file_get_contents('./productImage/femmes' . rand(1, 10) . '/511/639');
            $file = file_get_contents('./productImage/hommes' . rand(1, 10) . '/511/639');

            // On enregistre les octets récupérés dans un fichier on utilise la classe de Laravel Storage
            Storage::put($link, $file);
        });
    }
}
