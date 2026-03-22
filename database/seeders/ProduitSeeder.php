<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produit::factory(20)->create();                 // wla ndiro Produit::factory()->count(20)->create();
        Produit::create([
            'nom' => 'Produit spécial',
            'prix' => 49.99,
            'stock' => 10
        ]);
    }
}
