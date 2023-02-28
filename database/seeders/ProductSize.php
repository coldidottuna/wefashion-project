<?php

namespace Database\Seeders;


use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class ProductSize extends Seeder
{

    public function run(): void
    {
        for ($i = 0; $i < 240; $i++) {
            // génère un produit aléatoire
            $product = Product::all()->random();
            // génère une taille aléatoire
            $size = Size::all()->random();  

            // créer une relation entre le produit et la taille si il n'en existe pas déjà une .
            // Appeler la méthode syncWithoutDetaching() avec le tableau de valeurs supplémentaires représentant les champs created_at et updated_at
            $product->sizes()->syncWithoutDetaching([$size->id => ['created_at' =>now(),'updated_at' => now()]]);

        }
    }
}
