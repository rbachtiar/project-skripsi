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
        DB::table('users')->insert([
            'kode_gejala' => 'G13',
            'gejala' => 'Demam?',
            'ya' => 'G34',
            'tidak' => 'G1',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G34',
            'gejala' => 'Nyeri mengunyah?',
            'ya' => 'G21',
            'tidak' => 'G24',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G21',
            'gejala' => 'Bau Mulut Tak Sedap?',
            'ya' => 'G1',
            'tidak' => 'G28',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G28',
            'gejala' => 'Bau Mulut Tak Sedap?',
            'ya' => 'P8',
            'tidak' => 'p8',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G1',
            'gejala' => 'Terasa tidak enak dimulut?',
            'ya' => 'G38',
            'tidak' => 'G38',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G1',
            'gejala' => 'Terasa tidak enak dimulut?',
            'ya' => 'G38',
            'tidak' => 'G38',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G38',
            'gejala' => 'Nyeri bila disentuh?',
            'ya' => 'G35',
            'tidak' => 'G35',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G35',
            'gejala' => 'Nyeri bila disentuh?',
            'ya' => 'G2',
            'tidak' => 'G2',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G2',
            'gejala' => 'Tampak cairan eksudat purulen?',
            'ya' => 'P1',
            'tidak' => 'P1',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G24',
            'gejala' => 'Gusi mudah berdarah?',
            'ya' => 'G31',
            'tidak' => 'G4',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G31',
            'gejala' => 'Muncul benjolan kemerahan pada lubang gigi?',
            'ya' => 'P3',
            'tidak' => 'P3',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G4',
            'gejala' => 'Bercak putih berlendir pada mulut?',
            'ya' => 'G6',
            'tidak' => 'G1',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G6',
            'gejala' => 'Bercak putih pada rongga mulut?',
            'ya' => 'P6',
            'tidak' => 'P6',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G1',
            'gejala' => 'Bau mulut tak sedap?',
            'ya' => 'G38',
            'tidak' => 'G38',
        ]);
        
        DB::table('users')->insert([
            'kode_gejala' => 'G38',
            'gejala' => 'Terasa tidak enak dimulut?',
            'ya' => 'G14',
            'tidak' => 'G14',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G14',
            'gejala' => 'Sakit dibagian gigi yang dicabut?',
            'ya' => 'G33',
            'tidak' => 'G33',
        ]);
        DB::table('users')->insert([
            'kode_gejala' => 'G33',
            'gejala' => 'Nyeri pada kelenjar ludah?',
            'ya' => 'P8',
            'tidak' => 'P8',
        ]);
    }
}
