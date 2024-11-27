<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menginisialisasi Faker
        $faker = Faker::create();

        // Menghasilkan 10.000 data dummy
        $data = [];
        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'agenda' => $faker->sentence,
                'bagian' => $faker->word,
                'ruang_meeting' => $faker->word,
                'tanggal' => $faker->date('d/m/Y'),
                'mulai_meeting' => $faker->time('H:i'),
                'selesai_meeting' => $faker->time('H:i'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('book_ruangans')->insert($data);
    }
}
