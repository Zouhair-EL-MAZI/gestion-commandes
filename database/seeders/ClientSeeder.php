<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory(20)->create();                 // wla ndiro Client::factory()->count(20)->create();
        Client::create([
            'nom' => 'Zouhair',
            'email' => 'zouhair@example.com',
            'telephone' => '0612345678'
        ]);
    }
}
