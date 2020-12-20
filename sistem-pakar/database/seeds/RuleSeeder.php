<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->insert([
            'kode_gejala' => 'G13',
            'gejala' => 'Demam?',
            'ya' => 'G34',
            'tidak' => 'G1',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G34',
            'gejala' => 'Nyeri mengunyah?',
            'ya' => 'G21',
            'tidak' => 'G24',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G21',
            'gejala' => 'Bau Mulut Tak Sedap?',
            'ya' => 'G1',
            'tidak' => 'G28',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G28',
            'gejala' => 'Bau Mulut Tak Sedap?',
            'ya' => 'P8',
            'tidak' => 'p8',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G1',
            'gejala' => 'Terasa tidak enak dimulut?',
            'ya' => 'G38',
            'tidak' => 'G38',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G1',
            'gejala' => 'Terasa tidak enak dimulut?',
            'ya' => 'G38',
            'tidak' => 'G38',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G38',
            'gejala' => 'Nyeri bila disentuh?',
            'ya' => 'G35',
            'tidak' => 'G35',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G35',
            'gejala' => 'Nyeri bila disentuh?',
            'ya' => 'G2',
            'tidak' => 'G2',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G2',
            'gejala' => 'Tampak cairan eksudat purulen?',
            'ya' => 'P1',
            'tidak' => 'P1',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G24',
            'gejala' => 'Gusi mudah berdarah?',
            'ya' => 'G31',
            'tidak' => 'G4',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G31',
            'gejala' => 'Muncul benjolan kemerahan pada lubang gigi?',
            'ya' => 'P3',
            'tidak' => 'P3',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G4',
            'gejala' => 'Bercak putih berlendir pada mulut?',
            'ya' => 'G6',
            'tidak' => 'G1',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G6',
            'gejala' => 'Bercak putih pada rongga mulut?',
            'ya' => 'P6',
            'tidak' => 'P6',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G1',
            'gejala' => 'Bau mulut tak sedap?',
            'ya' => 'G38',
            'tidak' => 'G38',
        ]);
        
        DB::table('rules')->insert([
            'kode_gejala' => 'G38',
            'gejala' => 'Terasa tidak enak dimulut?',
            'ya' => 'G14',
            'tidak' => 'G14',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G14',
            'gejala' => 'Sakit dibagian gigi yang dicabut?',
            'ya' => 'G33',
            'tidak' => 'G33',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G33',
            'gejala' => 'Nyeri pada kelenjar ludah?',
            'ya' => 'P8',
            'tidak' => 'P8',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G1',
            'gejala' => ' Bau Mulut Tak Sedap?',
            'ya' => 'G21',
            'tidak' => 'G38',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G38',
            'gejala' => ' Terasa tidak enak dimulut?',
            'ya' => 'G19',
            'tidak' => 'G28',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G19',
            'gejala' => ' Gigi Nyeri Saat Terkena Rangsangan?',
            'ya' => 'G7',
            'tidak' => 'G7',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G37',
            'gejala' => 'Sensitiv terhadap Makanan Manis?',
            'ya' => 'P7',
            'tidak' => 'P7',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G28',
            'gejala' => 'Luka Mudah berdarah ?',
            'ya' => 'G8',
            'tidak' => 'G8',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G8',
            'gejala' => 'Bibir Pecah-Pecah ?',
            'ya' => 'G9',
            'tidak' => 'G9',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G9',
            'gejala' => 'Bibir Terasa Kering dan Keras?',
            'ya' => 'G10',
            'tidak' => 'G10',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G10',
            'gejala' => 'Bibir Terasa Panas Seperti Dibakar?',
            'ya' => 'G12',
            'tidak' => 'G12',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G12',
            'gejala' => 'Bintik-bintik merah berisik di daerah Mulut?',
            'ya' => 'G26',
            'tidak' => 'G26',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G26',
            'gejala' => 'Kemerahan pada sudut-sudut Mulut?',
            'ya' => 'P2',
            'tidak' => 'P2',
        ]); 
        DB::table('rules')->insert([
            'kode_gejala' => 'G21',
            'gejala' => 'Gusi Bengkak?',
            'ya' => 'G24',
            'tidak' => 'G24',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G24',
            'gejala' => 'Gusi Mudah Berdarah?',
            'ya' => 'G35',
            'tidak' => 'G35',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G35',
            'gejala' => 'Nyeri Bila Di Sentuh?',
            'ya' => 'G18',
            'tidak' => 'G18',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G18',
            'gejala' => 'Gigi Keluar Darah?',
            'ya' => 'G23',
            'tidak' => 'G23',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G23',
            'gejala' => 'Gigi Merah Muda?',
            'ya' => 'G40',
            'tidak' => 'G40',
        ]);
        DB::table('rules')->insert([
            'kode_gejala' => 'G40',
            'gejala' => 'Terdapat Plak?',
            'ya' => 'P4',
            'tidak' => 'P4',
        ]);
    }
}
