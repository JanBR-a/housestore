<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesSeeder extends Seeder
{
    public function run()
    {
        $properties = [
            [
                'title' => 'Hermosa Casa en las Afueras',
                'description' => 'Casa espaciosa con vistas a la montaña',
                'price' => 250000.00,
                'address' => 'Calle Principal 123, Ciudad',
                'image' => 'casa1.jpg',
                'type' => 'casa',
                'garden' => true,
                'state' => 'compra',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'm2' => 150,
                'user_id' => 1, // Asegúrate de que este usuario exista
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Apartamento Moderno Centro',
                'description' => 'Apartamento recién renovado en el corazón de la ciudad',
                'price' => 1200.00,
                'address' => 'Avenida Central 456, Ciudad',
                'image' => 'apartamento1.jpg',
                'type' => 'apartamento',
                'garden' => false,
                'state' => 'alquiler',
                'bedrooms' => 2,
                'bathrooms' => 1,
                'm2' => 80,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Chalet de Lujo con Piscina',
                'description' => 'Chalet exclusivo con todas las comodidades',
                'price' => 450000.00,
                'address' => 'Camino del Bosque 789, Afueras',
                'image' => 'chalet1.jpg',
                'type' => 'chalet',
                'garden' => true,
                'state' => 'compra',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'm2' => 250,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Solar Urbano',
                'description' => 'Terreno perfecto para construir tu casa ideal',
                'price' => 80000.00,
                'address' => 'Calle del Sol 101, Ciudad',
                'image' => 'solar1.jpg',
                'type' => 'solar',
                'garden' => false,
                'state' => 'compra',
                'bedrooms' => 0,
                'bathrooms' => 0,
                'm2' => 300,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('properties')->insert($properties);
    }
}
