<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'nama'=>'Kementerian Komunikasi dan Informatika',
                'tempat_tugas_id'=>1
            ],
            [
                'nama'=>'Kanwil Kementerian Hukum dan HAM Sulawesi Selatan',
                'tempat_tugas_id'=>2
            ],
            [
                'nama'=>'Kantor Wilayah Bea Cukai Sumatera Utara dan Kepulauan Riau',
                'tempat_tugas_id'=>3
            ],
            [
                'nama'=>'Kanwil Kementerian Sosial Jawa Barat',
                'tempat_tugas_id'=>4
            ],
            [
                'nama'=>'Kanwil Kementerian Agama Daerah Istimewa Yogyakarta',
                'tempat_tugas_id'=>5
            ],
        ])->each(function ($unit_kerja) {
            UnitKerja::create([
                'nama'=>$unit_kerja['nama'],
                'tempat_tugas_id'=>$unit_kerja['tempat_tugas_id']
            ]);
        });
    }
}

