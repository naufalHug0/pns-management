<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['role' => 'admin', 'golongan_id' => 16, 'jabatan_id' => 1, 'npwp' => '285.482.924.5-415.333', 'nip' => '24441663454'],
            ['role' => 'petugas', 'golongan_id' => 15, 'jabatan_id' => 2, 'npwp' => '139.726.301.1-759.984', 'nip' => '80425349068'],
            ['role' => 'pegawai', 'golongan_id' => 15, 'jabatan_id' => 7, 'npwp' => '567.831.044.8-372.910', 'nip' => '81741837376'],
            ['role' => 'petugas', 'golongan_id' => 15, 'jabatan_id' => 6, 'npwp' => '703.285.177.4-659.502', 'nip' => '19592166308'],
            ['role' => 'pegawai', 'golongan_id' => 15, 'jabatan_id' => 13, 'npwp' => '491.657.320.6-890.217', 'nip' => '30169942416'],
            ['role' => 'petugas', 'golongan_id' => 15, 'jabatan_id' => 11, 'npwp' => '822.119.435.2-574.608', 'nip' => '95992005756'],
            ['role' => 'pegawai', 'golongan_id' => 16, 'jabatan_id' => 14, 'npwp' => '355.748.902.3-281.496', 'nip' => '73790611000'],
            ['role' => 'petugas', 'golongan_id' => 15, 'jabatan_id' => 15, 'npwp' => '610.594.123.9-843.275', 'nip' => '20274536379'],
            ['role' => 'pegawai', 'golongan_id' => 16, 'jabatan_id' => 19, 'npwp' => '244.938.076.7-512.084', 'nip' => '19945501440'],
            ['role' => 'petugas', 'golongan_id' => 16, 'jabatan_id' => 20, 'npwp' => '783.201.564.1-987.630', 'nip' => '40911772614'],
        ])->each(function ($pegawai) {
            Pegawai::create([
                'nama' => fake()->name(),
                'password' => Hash::make('12345'),
                'nip' => $pegawai['nip'],
                'npwp' => $pegawai['npwp'],
                'no_hp' => fake()->phoneNumber(),
                'alamat' => fake()->address(),
                'tanggal_lahir' => fake()->date('Y-m-d', '1990-01-01'),
                'tempat_lahir' => fake()->city(),
                'jenis_kelamin' => ['L', 'P'][mt_rand(0, 1)],
                'foto_profil' => null,
                'agama_id' => mt_rand(1, 6),
                'role' => $pegawai['role'],
                'golongan_id' => $pegawai['golongan_id'],
                'jabatan_id' => $pegawai['jabatan_id'],
            ]);
        });
    }
}
