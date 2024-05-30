<?php

namespace Database\Seeders;

use App\Models\TempatTugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TempatTugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'Jakarta',
            'Makassar',
            'Medan',
            'Bandung',
            'Yogyakarta'
        ])->each(function ($tempat) {
            TempatTugas::create([
                'nama'=>$tempat
            ]);
        });
    }
}
