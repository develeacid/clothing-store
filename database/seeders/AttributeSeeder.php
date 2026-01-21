<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;
use Illuminate\Support\Str;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tallas
        $size = ProductAttribute::create(['name' => 'Talla', 'slug' => 'talla']);
        foreach (['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'] as $s) {
            $size->options()->create(['value' => $s]);
        }

        // 2. Colores
        $color = ProductAttribute::create(['name' => 'Color', 'slug' => 'color']);
        $colors = [
            ['value' => 'Rojo', 'hex' => '#FF0000'],
            ['value' => 'Azul', 'hex' => '#0000FF'],
            ['value' => 'Verde', 'hex' => '#008000'],
            ['value' => 'Negro', 'hex' => '#000000'],
            ['value' => 'Blanco', 'hex' => '#FFFFFF'],
        ];
        foreach ($colors as $c) {
            $color->options()->create(['value' => $c['value'], 'color_hex' => $c['hex']]);
        }

        // 3. Ocasiones
        $occasion = ProductAttribute::create(['name' => 'Ocasión', 'slug' => 'ocasion']);
        foreach (['San Valentín', 'Vacaciones', 'Navidad', 'Casual', 'Formal'] as $o) {
            $occasion->options()->create(['value' => $o]);
        }

        // 4. Corte (Pantalones)
        $cut = ProductAttribute::create(['name' => 'Corte', 'slug' => 'corte']);
        $cuts = ['Slim', 'Normal', 'Curvy', 'Skinny', 'Recto'];
        foreach ($cuts as $c) {
            $cut->options()->create(['value' => $c]);
        }

        // 5. Tiro (Pantalones Mujer)
        $rise = ProductAttribute::create(['name' => 'Tiro', 'slug' => 'tiro']);
        foreach (['Corto', 'Mediano', 'Largo'] as $r) {
            $rise->options()->create(['value' => $r]);
        }

        // 6. Nivel de Stretch
        $stretch = ProductAttribute::create(['name' => 'Stretch', 'slug' => 'stretch']);
        foreach (['Bajo', 'Medio', 'Alto'] as $s) {
            $stretch->options()->create(['value' => $s]);
        }

        // 7. Escote (Vestidos)
        $neckline = ProductAttribute::create(['name' => 'Escote', 'slug' => 'escote']);
        $necklines = [
            'Cuello',
            'Cuello Grande',
            'Cuello Redondo',
            'Cuello Alto',
            'Hombros Caidos',
            'Escote Redondo',
            'Escote Corazón',
            'Escote V'
        ];
        foreach ($necklines as $n) {
            $neckline->options()->create(['value' => $n]);
        }

        // 8. Largo (Vestidos)
        $length = ProductAttribute::create(['name' => 'Largo', 'slug' => 'largo']);
        $lengths = ['Hasta el tobillo', 'Largo completo', 'Medio', 'Mini'];
        foreach ($lengths as $l) {
            $length->options()->create(['value' => $l]);
        }
    }
}
