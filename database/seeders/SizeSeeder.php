<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sizes = [
            [
                "size" => "XS",
            ],
            [
                "size" => "S",
            ],
            [
                "size" => "M",
            ],
            [
                "size" => "L",
            ],
            [
                "size" => "XL",
            ],
        ];
                // les ajouter dans la base de donnée
                foreach ($sizes as $size) {
                    Size::create($size);
                }
    }
}
