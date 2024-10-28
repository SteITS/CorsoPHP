<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('flags')->insert([
        ['name' => 'Italia', 'image' => 'url_della_bandiera_italiana.png'],
        ['name' => 'Francia', 'image' => 'url_della_bandiera_francese.png'],
        // Aggiungi altre bandiere qui
    ]);
}
}
