<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Server;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Unit::create([
            'name' => 'Fakultas Teknologi Informasi dan Sains Data',
        ]);

        Unit::create([
            'name' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
        ]);

        Unit::create([
            'name' => 'Fakultas Pertanian',
        ]);
        Unit::create([
            'name' => 'Fakultas Keguruan dan Ilmu Pendidikan',
        ]);
        Unit::create([
            'name' => 'Fakultas Kedokteran',
        ]);
        Unit::create([
            'name' => 'Fakultas Teknik',
        ]);
        Unit::create([
            'name' => 'Fakultas Hukum',
        ]);
        Unit::create([
            'name' => 'Fakultas Ekonomi dan Bisnis',
        ]);
        Unit::create([
            'name' => 'Fakultas Sosial dan Politik',
        ]);
        Unit::create([
            'name' => 'Fakultas Keolahragaan',
        ]);
        Unit::create([
            'name' => 'Fakultas Ilmu Budaya',
        ]);
        Unit::create([
            'name' => 'Fakultas Psikologi',
        ]);
        Unit::create([
            'name' => 'Fakultas Seni Rupa dan Desain',
        ]);
        Unit::create([
            'name' => 'Pascasarjana',
        ]);
        Unit::create([
            'name' => 'Sekolah Vokasi',
        ]);

        Server::create([
            'name' => 'Serenity Realm',
            'ip_address' => '10.11.12.1',
            'processor' => 'Intel Xeon Gold',
            'jumlah_core' => 12,
            'ram' => 64,
            'jenis_server' => 'Web Server',
            'jenis' => 'fisik',
            'status' => 'aktif'
        ]);
        Server::create([
            'name' => 'Eternity Forge',
            'ip_address' => '10.11.12.2',
            'processor' => 'AMD Ryzen Threadripper',
            'jumlah_core' => 16,
            'ram' => 64,
            'jenis_server' => 'Email Server',
            'jenis' => 'fisik',
            'status' => 'aktif'
        ]);
    }
}
