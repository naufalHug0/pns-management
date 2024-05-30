<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'Islam', 
            'Kristen', 
            'Katolik', 
            'Hindu', 
            'Budha', 
            'Konghucu'
        ])->each(function ($nama) {
            Agama::create([
                "nama"=>$nama
            ]);
        });
    }
}
