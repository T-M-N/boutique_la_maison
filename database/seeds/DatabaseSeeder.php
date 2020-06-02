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
        // $this->call(UserSeeder::class);
        
        //appel de la factory dans cette classe pour générer les données d'exemple dans table products
      
        $this->call(ProductTableSeeder::class);
    }
}
