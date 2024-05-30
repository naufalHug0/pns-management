<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            // Kementrian Informatika
            [
                'nama' => 'Pejabat Fungsional Informatika Ahli Utama',
                'eselon_id' => 2,
                'unit_kerja_id' => 1
            ],
            [
                'nama' => 'Analis Sistem Informatika Ahli Utama',
                'eselon_id' => 3,
                'unit_kerja_id' => 1
            ],
            [
                'nama' => 'Juru Pengawas Kualitas Telekomunikasi Ahli Utama',
                'eselon_id' => 3,
                'unit_kerja_id' => 1
            ],
            [
                'nama' => 'Staf Ahli Utama',
                'eselon_id' => 2,
                'unit_kerja_id' => 1
            ],

            // Kanwil Kementerian Hukum dan HAM Sulawesi Selatan
            [
                'nama' => 'Kepala Kantor Wilayah',
                'eselon_id' => 2,
                'unit_kerja_id' => 2
            ],
            [
                'nama' => 'Kepala Divisi Administrasi',
                'eselon_id' => 3,
                'unit_kerja_id' => 2
            ],
            [
                'nama' => 'Kepala Divisi Pemasyarakatan',
                'eselon_id' => 3,
                'unit_kerja_id' => 2
            ],
            [
                'nama' => 'Kepala Divisi Keimigrasian',
                'eselon_id' => 3,
                'unit_kerja_id' => 2
            ],
            [
                'nama' => 'Kepala Divisi Pelayanan Hukum dan HAM',
                'eselon_id' => 3,
                'unit_kerja_id' => 2
            ],

            // Kantor Wilayah Bea Cukai Sumatera Utara dan Kepulauan Riau
            [
                'nama' => 'Kepala Kantor Wilayah',
                'eselon_id' => 2,
                'unit_kerja_id' => 3
            ],
            [
                'nama' => 'Kepala Bidang Akuntansi Kepabeanan dan Cukai',
                'eselon_id' => 3,
                'unit_kerja_id' => 3
            ],
            [
                'nama' => 'Kepala Bidang Penindakan dan Penyidikan',
                'eselon_id' => 3,
                'unit_kerja_id' => 3
            ],
            [
                'nama' => 'Kepala Bidang Kepabeanan dan Cukai',
                'eselon_id' => 3,
                'unit_kerja_id' => 3
            ],

            // Kanwil Kementerian Sosial Jawa Barat
            [
                'nama' => 'Kepala Kantor Wilayah',
                'eselon_id' => 2,
                'unit_kerja_id' => 4
            ],
            [
                'nama' => 'Kepala Bidang Pemberdayaan Sosial',
                'eselon_id' => 3,
                'unit_kerja_id' => 4
            ],
            [
                'nama' => 'Kepala Bidang Rehabilitasi Sosial',
                'eselon_id' => 3,
                'unit_kerja_id' => 4
            ],
            [
                'nama' => 'Kepala Bidang Perlindungan dan Penanganan Bencana Sosial',
                'eselon_id' => 3,
                'unit_kerja_id' => 4
            ],

            // Kanwil Kementerian Agama Daerah Istimewa Yogyakarta
            [
                'nama' => 'Kepala Kantor Wilayah',
                'eselon_id' => 2,
                'unit_kerja_id' => 5
            ],
            [
                'nama' => 'Kepala Bidang Pendidikan Islam',
                'eselon_id' => 3,
                'unit_kerja_id' => 5
            ],
            [
                'nama' => 'Kepala Bidang Bimas Islam',
                'eselon_id' => 3,
                'unit_kerja_id' => 5
            ],
            [
                'nama' => 'Kepala Bidang Penyelenggaraan Haji dan Umrah',
                'eselon_id' => 3,
                'unit_kerja_id' => 5
            ],
        ])->each(function ($jabatan) {
            Jabatan::create([
                'nama' => $jabatan['nama'],
                'eselon_id' => $jabatan['eselon_id'],
                'unit_kerja_id' => $jabatan['unit_kerja_id'],
            ]);
        });
    }
}
