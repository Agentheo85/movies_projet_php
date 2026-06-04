<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class MovieSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * php artisan db:seed --class=MovieSeeder
     */
    public function run(): void
    {
        $json = Storage::json('Film.JSON');
       
        $months = [
    'Jan' => '01',
    'Feb' => '02',
    'Mar' => '03',
    'Apr' => '04',
    'May' => '05',
    'Jun' => '06',
    'Jul' => '07',
    'Aug' => '08',
    'Sep' => '09',
    'Oct' => '10',
    'Nov' => '11',
    'Dec' => '12',
];


        foreach($json['movies'] as $movie) {
            [$jour, $mois, $annee] = explode(" ",$movie["Released"]);
            $moisNombre =  $months[$mois];
             Movie::create(
            [  'title' => $movie['Title'],
                'Released' => $jour."/".$moisNombre."/".$annee, /* trop long a faire pour le projet */
                'rated' => intval(explode("/",$movie["Ratings"][0]['Value'])[0])/2,
                'banner' => $movie['Poster'] ?? null
                ],);
        };
      
    }
}
