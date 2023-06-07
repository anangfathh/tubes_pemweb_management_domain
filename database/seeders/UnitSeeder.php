<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Unit::create([
            'name' => 'Fakultas Teknologi Informasi dan Sains Data',
        ]);

        Unit::create([
            'name' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
        ]);

        Unit::create([
            'name' => 'Fakultas Pertanian',
        ]);
    }
}
