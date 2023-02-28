<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function generateReference($limit = 100,Faker $faker)
    {
        $ref = $faker->numerify('product-########');
        if (Product::where('reference', $ref)->exists()) {
            if ($limit <= 0) {
                throw new Exception('Incapable de générer une référence unique.');
            }
            return $this->generateReference($limit - 1,$faker);
        }
        return $ref;
    }


    public function run(Faker $faker): void 
    {

        $rand= $faker->word();
        // créer une boucle qui va générer 80 produits
        for ($i = 0; $i < 80; $i++) {
            // générer une categorie aleatoire
            $category = Category::all()->random();

            DB::table('products')->insert([
                'name' => $faker->word(), //génere un mot
                'description' => $faker->text(), //génere un text de 200 caractère
                'price' => $faker->randomFloat(2), //génere un nombre décimal 
                'visibility' => $faker->randomElement([0,1]), //génere un booleen
                'condition' => $faker->randomElement([0, 1]), //génere un booleen
                'reference' => $this->generateReference(100,$faker), //génere une référence
                'category' => $faker->randomElement(['femme', 'homme']), //récupère l'id de la categorie généré plus tôt
                'image' => "product/" .$category->category_name. "-" . $faker->numberBetween(1, 10) . ".jpg", // génere un nom de fichier composé du nom de la categorie suivit d'un id
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }



    //
}
