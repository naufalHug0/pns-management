<?php

namespace Database\Seeders;

use App\Models\Eselon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EselonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'I',
            'II',
            'III',
            'IV',
            'V'
        ])->each(function ($eselon) {
            Eselon::create([
                'nama' => $eselon,
            ]);
        });
    }
}
