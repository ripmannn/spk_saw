<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        DB::table('tb_alternatif')->insert([
            [
                'id_alternatif' => 'A01',
                'nama_alternatif' => 'Arief',
            ],
            [
                'id_alternatif' => 'A02',
                'nama_alternatif' => 'Arya',
            ],
            [
                'id_alternatif' => 'A03',
                'nama_alternatif' => 'Bewok',
            ],
        ]);

        DB::table('tb_kriteria')->insert([
            [
                'id_kriteria' => 'C01',
                'nama_kriteria' => 'Rata-rata raport',
                'atribut' => 'Benefit',
                'bobot' => 0.40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 'C02',
                'nama_kriteria' => 'Sikap',
                'atribut' => 'Benefit',
                'bobot' => 0.20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 'C03',
                'nama_kriteria' => 'Absensi',
                'atribut' => 'Benefit',
                'bobot' => 0.20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kriteria' => 'C04',
                'nama_kriteria' => 'Ekstrakurikuler',
                'atribut' => 'Benefit',
                'bobot' => 0.20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::statement("INSERT INTO tb_nilai (id_alternatif, id_kriteria, nilai) SELECT id_alternatif, id_kriteria, FLOOR(1 + RAND() * 5) FROM tb_alternatif, tb_kriteria");
    }
}
