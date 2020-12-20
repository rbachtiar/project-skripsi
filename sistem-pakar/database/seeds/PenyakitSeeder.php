<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P1',
            'penyakit' => 'Abses periodontal',
            'info' => 'Abses periodontal/Abses gigi adalah terbentuknya nanah akibat infeksi parah pada bagian lunak atau pulpa gigi yang dapat menyebar ke daerah akar (abses periapikal). Nanah yang terkumpul seolah berada di dalam sebuah kantung yang dapat terus meluas seiring bertambahnya jumlah nanah (pus) dan keparahan infeksi. Gejala utamanya adalah sakit gigi yang parah. Rasa sakit terjadi begitu intens dan terus menerus, seolah tak mau berhenti. Jika digambarkan sifat sakitnya terasa menggerogoti, tajam, atau berdenyut-denyut',
            'solusi' => 'solusi'
        ]);
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P2',
            'penyakit' => 'Angular Cheilitis',
            'info' => 'Angular cheilitis, juga dikenal sebagai angular stomatitis atau perlèche, adalah suatu kondisi yang menyebabkan timbulnya bercak merah seperti bengkak pada sudut-sudut di bagian luar bibir Anda. Hampir semua gejala Angular cheilitis dapat Anda temukan pada sudut mulut. Gejala-gejalanya bisa menimbulkan nyeri dan membuat frustasi. Gejala angular cheilitis dapat bervariasi dari hanya timbul bercak kemerahan hingga memiliki luka lepuh terbuka yang berdarah.',
            'solusi' => 'solusi'
        ]);
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P3',
            'penyakit' => 'Eritema multiformis',
            'info' => 'Eritema multiforme adalah suatu penyakit kulit yang disebabkan oleh infeksi yang menimbulkan hipersensitivitas kulit. Penyakit ini akan menimbulkan bercak warna kemerahan yang menyebar disertai gejala lainnya yang disesuaikan dengan penyebab infeksi. Kondisi ini bisa disebut penyakit ringan karena jarang sekali menimbulkan komplikasi. Eritema multifome merupakan sebuah penyakit dengan keluhan berupa bercak pada kulit. Munculnya lesi kulit tidak hanya di badan tetapi juga di daerah sekitar mata, bibir, dan alat kelamin. Hingga saat ini infeksi menjadi penyebab utama pada hipersensitivitas yang meningkatkan resiko munculnya eritema multiforme.',
            'solusi' => 'solusi'
        ]);
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P4',
            'penyakit' => 'Gingivitis',
            'info' => 'Gingivitis adalah tahap awal penyakit gusi yang perlu diobati segera. Gingivitis terjadi akibat penumpukan plak dari sisa makanan yang memicu pertumbuhan bakteri di gusi. Plak tersebut bersifat lengket, tidak berwarna, dan terbentuk secara bertahap pada gigi dan gusi. Penyebab gingivitis yang utama adalah bakteri yang membentuk plak pada rongga mulut.',
            'solusi' => 'solusi'
        ]);
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P5',
            'penyakit' => 'Herpes mulut',
            'info' => 'Herpes mulut atau yang dikenal dengan herpes oral merupakan suatu penyakitgt;infeksi yang disebabkan oleh virus herpes simpleks. Kebanyakan herpes mulut ini disebabkan oleh virus herpes simpleks tipe I (HSV-1).  Infeksi herpes mulut ini bisa menyerupai bentuk sariawan.',
            'solusi' => 'solusi'
        ]);
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P6',
            'penyakit' => 'Kandidiasis Orofaringeal',
            'info' => 'Kandidiasis orofaringeal menimbulkan gejala berupa bercak putih atau plak di lidah dan selaput lendir mulut. Gejala tersebut dapat disertai kemerahan, nyeri, sulit menelan, dan cracking di sudut mulut (cheilitis angular).',
            'solusi' => 'solusi'
        ]);
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P7',
            'penyakit' => 'Pulpitis',
            'info' => 'Pulpitis dapat terjadi pada satu gigi atau lebih. Pulpitis disebabkan oleh bakteri yang menyerang pulpa gigi, sehingga menyebabkan peradangan dan membengkak.',
            'solusi' => 'solusi'
        ]);
        DB::table('penyakit')->insert([
            'kode_penyakit' => 'P8',
            'penyakit' => 'Alveolar Osteitis',
            'info' => 'Alveolar Osteitis adalah komplikasi yang paling sering ditemukan pada orang setelah cabut gigi. Gejala yang ditimbulkan adalah nyeri hebat, sakit yang menjalar disisi yang sama dengan gigi yang dicabut, bau mulut dan rasa tidak enak dimulut.',
            'solusi' => 'solusi'
        ]);
    }
}
