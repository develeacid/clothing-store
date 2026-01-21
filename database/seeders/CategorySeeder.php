<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hierarchy = [
            'Hombres' => [
                'Partes de arriba' => [
                    'Camisas',
                    'Sudaderas',
                    'Playeras',
                    'Tops con gráfico',
                    'Polos',
                    'Térmicos',
                    'Suéteres',
                    'Chamarras y abrigos',
                ],
                'Partes de abajo' => [
                    'Pantalones',
                    'Jeans',
                    'Joggers',
                    'Shorts',
                    'Ropa Interior',
                ],
            ],
            'Mujeres' => [
                'Partes de arriba' => [
                    'Camisas y blusas',
                    'Sudaderas',
                    'Playeras',
                    'Tops con gráfico',
                    'Suéteres y cardigans',
                    'Chamarras y chalecos',
                    'Tops sin mangas y Tops Tubo',
                ],
                'Partes de abajo' => [
                    'Pantalones',
                    'Jeans',
                    'Faldas',
                    'Shorts',
                    'Leggings',
                ],
                'Vestidos' => [
                    'Vestidos cortos',
                    'Vestidos midi + maxi',
                    'Jumpsuits y Rompers',
                    'Vestidos para citas por la noche',
                    'Vestidos informales',
                ],
            ],
        ];

        foreach ($hierarchy as $rootName => $subCategories) {
            $root = Category::create([
                'name' => $rootName,
                'slug' => Str::slug($rootName),
            ]);

            foreach ($subCategories as $subName => $leafs) {
                $sub = Category::create([
                    'name' => $subName,
                    'slug' => Str::slug($rootName . '-' . $subName),
                    'parent_id' => $root->id,
                ]);

                foreach ($leafs as $leafName) {
                    Category::create([
                        'name' => $leafName,
                        'slug' => Str::slug($rootName . '-' . $subName . '-' . $leafName),
                        'parent_id' => $sub->id,
                    ]);
                }
            }
        }
    }
}
