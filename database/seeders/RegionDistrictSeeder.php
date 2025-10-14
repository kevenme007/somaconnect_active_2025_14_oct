<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //CONTROL SEEDERS DUPLICATES
        $seederName = static::class;
        $alreadySeeded = DB::table('seeder_logs')->where('seeder_name', $seederName)->exists();
        if ($alreadySeeded) {
            $this->command->info("$seederName already run. Skipping.");
            return;
        }

        DB::table('seeder_logs')->insert([
            'seeder_name' => $seederName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $regions = [
            'Arusha' => [
                'Arusha Urban',
                'Arusha Rural',
                'Meru',
                'Monduli',
                'Karatu',
                'Longido'
            ],
            'Dar es Salaam' => [
                'Ilala',
                'Kinondoni',
                'Temeke',
                'Ubungo',
                'Kigamboni'
            ],
            'Dodoma' => [
                'Dodoma Urban',
                'Dodoma Rural',
                'Bahi',
                'Chamwino',
                'Chemba',
                'Kondoa',
                'Kongwa'
            ],
            'Geita' => [
                'Geita',
                'Bukombe',
                'Chato',
                'Mbogwe',
                'Nyanghwale'
            ],
            'Iringa' => [
                'Iringa Urban',
                'Iringa Rural',
                'Kilolo',
                'Mufindi'
            ],
            'Kagera' => [
                'Bukoba Urban',
                'Bukoba Rural',
                'Biharamulo',
                'Karagwe',
                'Kyerwa',
                'Missenyi',
                'Ngara'
            ],
            'Katavi' => [
                'Mpanda Urban',
                'Mpanda Rural',
                'Mlele',
                'Tanganyika'
            ],
            'Kigoma' => [
                'Kigoma Urban',
                'Kigoma Rural',
                'Kasulu',
                'Buhigwe',
                'Kakonko',
                'Uvinza'
            ],
            'Kilimanjaro' => [
                'Moshi Urban',
                'Moshi Rural',
                'Hai',
                'Rombo',
                'Mwanga',
                'Same',
                'Siha'
            ],
            'Lindi' => [
                'Lindi Urban',
                'Lindi Rural',
                'Kilwa',
                'Liwale',
                'Nachingwea',
                'Ruangwa'
            ],
            'Manyara' => [
                'Babati Urban',
                'Babati Rural',
                'Hanang',
                'Kiteto',
                'Mbulu',
                'Simanjiro'
            ],
            'Mara' => [
                'Musoma Urban',
                'Musoma Rural',
                'Bunda',
                'Butiama',
                'Rorya',
                'Serengeti',
                'Tarime'
            ],
            'Mbeya' => [
                'Mbeya Urban',
                'Mbeya Rural',
                'Chunya',
                'Kyela',
                'Mbarali',
                'Rungwe'
            ],
            'Morogoro' => [
                'Morogoro Urban',
                'Morogoro Rural',
                'Kilosa',
                'Kilombero',
                'Mvomero',
                'Gairo',
                'Malinyi',
                'Ulanga'
            ],
            'Mtwara' => [
                'Mtwara Urban',
                'Mtwara Rural',
                'Masasi',
                'Nanyumbu',
                'Tandahimba',
                'Newala'
            ],
            'Mwanza' => [
                'Ilemela',
                'Nyamagana',
                'Kwimba',
                'Magu',
                'Misungwi',
                'Sengerema',
                'Ukerewe'
            ],
            'Njombe' => [
                'Njombe Urban',
                'Njombe Rural',
                'Ludewa',
                'Makete',
                'Wanging’ombe'
            ],
            'Pemba North' => [
                'Micheweni',
                'Wete'
            ],
            'Pemba South' => [
                'Chake Chake',
                'Mkoani'
            ],
            'Pwani' => [
                'Bagamoyo',
                'Kibaha',
                'Kisarawe',
                'Mafia',
                'Mkuranga',
                'Rufiji'
            ],
            'Rukwa' => [
                'Sumbawanga Urban',
                'Sumbawanga Rural',
                'Kalambo'
            ],
            'Ruvuma' => [
                'Songea Urban',
                'Songea Rural',
                'Mbinga',
                'Namtumbo',
                'Nyasa'
            ],
            'Shinyanga' => [
                'Shinyanga Urban',
                'Shinyanga Rural',
                'Kahama',
                'Kishapu'
            ],
            'Simiyu' => [
                'Bariadi',
                'Busega',
                'Itilima',
                'Maswa',
                'Meatu'
            ],
            'Singida' => [
                'Singida Urban',
                'Singida Rural',
                'Iramba',
                'Manyoni',
                'Ikungi'
            ],
            'Tabora' => [
                'Tabora Urban',
                'Tabora Rural',
                'Igunga',
                'Nzega',
                'Sikonge',
                'Uyui'
            ],
            'Tanga' => [
                'Tanga Urban',
                'Muheza',
                'Korogwe',
                'Lushoto',
                'Handeni',
                'Kilindi',
                'Mkinga',
                'Pangani'
            ],
            'Unguja North' => [
                'Kaskazini A',
                'Kaskazini B'
            ],
            'Unguja South' => [
                'Kusini A',
                'Kusini B'
            ],
            'Unguja Urban West' => [
                'Magharibi A',
                'Magharibi B',
                'Mjini'
            ],
        ];

        foreach ($regions as $region => $districts) {
            $regionId = DB::table('regions')->insertGetId([
                'name' => $region,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            foreach ($districts as $district) {
                DB::table('districts')->insert([
                    'name' => $district,
                    'region_id' => $regionId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
