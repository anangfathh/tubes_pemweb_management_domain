<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Unit;
use App\Models\User;
use App\Models\Server;
use Illuminate\Database\Seeder;

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
            'desc' => 'FATISDA',
            'higher_domain' => "fatisda.uns.ac.id"

        ]);

        Unit::create([
            'name' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fmipa.uns.ac.id'
        ]);

        Unit::create([
            'name' => 'Fakultas Pertanian',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fmipa.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Keguruan dan Ilmu Pendidikan',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fkip.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Kedokteran',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fk.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Teknik',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'ft.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Hukum',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fh.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Ekonomi dan Bisnis',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'feb.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Sosial dan Politik',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fisip.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Keolahragaan',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fkor.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Ilmu Budaya',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fib.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Psikologi',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fapsi.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Fakultas Seni Rupa dan Desain',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'fsrd.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Pascasarjana',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'ps.uns.ac.id'
        ]);
        Unit::create([
            'name' => 'Sekolah Vokasi',
            'desc' => 'Universitas Sebelas Maret',
            'higher_domain' => 'sv.uns.ac.id'
        ]);

        Server::create([
            'name' => 'Serenity Realm',
            'ip_address' => '10.11.12.1',
            'processor' => 'Intel Xeon Gold',
            'jumlah_core' => 12,
            'ram' => 64,
            'jenis' => 'fisik',
            'unit_id' => 1,
            'status' => 'aktif'
        ]);
        Server::create([
            'name' => 'Eternity Forge',
            'ip_address' => '10.11.12.2',
            'processor' => 'AMD Ryzen Threadripper',
            'jumlah_core' => 16,
            'ram' => 64,
            'unit_id' => 1,
            'jenis' => 'fisik',
            'status' => 'aktif'
        ]);

        User::create([
            'name' => 'Admin Fatisda',
            'email' => 'adminFatisda@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 1,
            'phone_number' => '08642352353',
        ]);
        User::create([
            'name' => 'Admin FK',
            'email' => 'adminFK@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 5,
            'phone_number' => '08642352353',
        ]);
        User::create([
            'name' => 'Admin FKIP',
            'email' => 'adminFKIP@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 4,
            'phone_number' => '08642352353',
        ]);
        User::create([
            'name' => 'Admin FT',
            'email' => 'adminFT@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 6,
            'phone_number' => '08642352353',
        ]);
        User::create([
            'name' => 'Admin FKOR',
            'email' => 'adminFKOR@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 10,
            'phone_number' => '08642352353',
        ]);
        User::create([
            'name' => 'Admin Sekolah Vokasi',
            'email' => 'adminSV@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 15,
            'phone_number' => '08642352353',
        ]);
        User::create([
            'name' => 'Admin FP',
            'email' => 'adminFP@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 3,
            'phone_number' => '08642352353',
        ]);
        User::create([
            'name' => 'Admin FEB',
            'email' => 'adminFEB@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'unit_id' => 8,
            'phone_number' => '08642352353',
        ]);
    }
}
