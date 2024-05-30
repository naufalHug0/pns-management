<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'kode'=>'I/a',
                'nama'=>'Juru Muda'            
            ],
            [
                'kode'=>'I/b',
                'nama'=>'Juru Muda Tingkat I'            
            ],
            [
                'kode'=>'I/c',
                'nama'=>'Juru'            
            ],
            [
                'kode'=>'I/d',
                'nama'=>'Juru Tingkat I'            
            ],
            [
                'kode'=>'II/a',
                'nama'=>'Pengatur Muda'            
            ],
            [
                'kode'=>'II/b',
                'nama'=>'Pengatur Muda Tingkat I'            
            ],
            [
                'kode'=>'II/c',
                'nama'=>'Pengatur'            
            ],
            [
                'kode'=>'II/d',
                'nama'=>'Pengatur Tingkat I'            
            ],
            [
                'kode'=>'III/a',
                'nama'=>'Penata Muda'            
            ],
            [
                'kode'=>'III/b',
                'nama'=>'Penata Muda Tingkat I'            
            ],
            [
                'kode'=>'III/c',
                'nama'=>'Penata'            
            ],
            [
                'kode'=>'III/d',
                'nama'=>'Penata Tingkat I'            
            ],
            [
                'kode'=>'IV/a',
                'nama'=>'Pembina'            
            ],
            [
                'kode'=>'IV/b',
                'nama'=>'Pembina Tingkat I'            
            ],
            [
                'kode'=>'IV/c',
                'nama'=>'Pembina Muda'            
            ],
            [
                'kode'=>'IV/d',
                'nama'=>'Pembina Madya'            
            ],
            [
                'kode'=>'IV/e',
                'nama'=>'Pembina Utama'            
            ],
        ])->each(function ($golongan) {
            Golongan::create([
                "kode"=>$golongan['kode'],
                "nama"=>$golongan['nama'],
            ]);
        });;
    }
}
