<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gejala')->insert([
            'kode_gejala' => 'G1',
            'gejala' => 'Bau mulut tak sedap?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G2',
            'gejala' => 'Tampak cairan eksudat purulen?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G4',
            'gejala' => 'Bercak putih berlendir pada mulut?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G6',
            'gejala' => 'Bercak putih pada rongga mulut?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G8',
            'gejala' => 'Bibir pecah-pecah?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G9',
            'gejala' => 'Bibir teras kering dan keras?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G10',
            'gejala' => 'Bibir terasa panas seperti terbakar?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G12',
            'gejala' => 'Bintik-bintik merah bersisik pada daerah mulut?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G13',
            'gejala' => 'Demam?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G14',
            'gejala' => 'Sakit dibagian gigi yang dicabut?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G18',
            'gejala' => 'Gigi keluar darah?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G19',
            'gejala' => 'Gigi nyeri saat terkena rangsangan (panas atau dingin)?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G21',
            'gejala' => 'Gusi bengkak?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G22',
            'gejala' => 'Gusi licin dan mengkilap?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G23',
            'gejala' => 'Gusi merah muda?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G24',
            'gejala' => 'Gusi mudah berdarah?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G25',
            'gejala' => 'Infeksi pada kelenjar ludah?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G26',
            'gejala' => 'Kemerahan pada sudut-sudut mulut?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G28',
            'gejala' => 'Luka mudah berdarah?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G31',
            'gejala' => 'Muncul benjolan kemerahan pada lubang gigi?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G33',
            'gejala' => 'Nyeri pada kelenjar ludah?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G34',
            'gejala' => 'Nyeri mengunyah?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G35',
            'gejala' => 'Nyeri bila disentuh?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G2',
            'gejala' => 'Tampak cairan eksudat purulen',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G37',
            'gejala' => 'Sensitiv terhadap makanan manis?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G38',
            'gejala' => 'Terasa tidak enak dimulut?',
        ]);
        DB::table('gejala')->insert([
            'kode_gejala' => 'G40',
            'gejala' => 'Terdapat plak?',
        ]);
    }
}
