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
       
        foreach($json['movies'] as $movie) {
             Movie::create(
            [  'title' => $movie['Title'],
                'Released' => '12/12/2025', /* trop long a faire pour le projet */
                'rated' => intval(explode("/",$movie["Ratings"][0]['Value'])[0])/2,
                'banner' => $movie['Poster'] ?? null
                ],);
        };
      
    }
}
