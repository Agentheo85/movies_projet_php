<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class movieController extends Controller
{
    private function getMovies()
    {
        return Movie::all();
// [
//             ['id' => 1, 'title' => 'Les triangles des bermunesss','rated'=>4,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2009","banner"=>'https://www.arte.tv/sites/olivierpere/files/2013/12/affiche-Le-Mystere-du-Triangle-des-Bermudes-The-Bermuda-Triangle-1978-1.jpg'],
//             ['id' => 2, 'title' => 'Jurassic Park','rated'=>4,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2009","banner"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7MfxTF-DKO5bwjFeGuIuI3_Wh0VSmjZtJAg&s"],
//             ['id' => 3, 'title' => 'Retour vers le futur','rated'=>4,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2009","banner"=>"https://fr.web.img6.acsta.net/c_310_420/pictures/22/07/22/15/00/2862661.jpg"],
//             ['id' => 4, 'title' => 'Interstellar','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2014","banner"=>"https://m.media-amazon.com/images/I/91vIHsL-zjL._AC_UF894,1000_QL80_.jpg"],
//             ['id' => 5, 'title' => 'Weathering with you','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2019","banner"=>"https://m.media-amazon.com/images/M/MV5BMmJiYWI4ZjktMzgyZS00MjBiLThmOTYtZWJmOTUzOTFkMTFiXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg"],
//             ['id' => 6, 'title' => 'I want to eat ur pancres','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2019","banner"=>"https://m.media-amazon.com/images/M/MV5BMTQ1ODIzOGQtOGFkZC00MWViLTgyYmUtNWJkNmIxZjYxMTdmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg"],
//             ['id' => 7, 'title' => 'A silent voice','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2016","banner"=>"https://static.wikia.nocookie.net/koenokatachi/images/3/3f/Silent_Voice.jpg/revision/latest?cb=20200717163818&path-prefix=fr"],
//             ['id' => 8, 'title' => 'Josée, le tigre et les poissons','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2016","banner"=>"https://m.media-amazon.com/images/I/81nvHysPyjL._AC_UF1000,1000_QL80_.jpg"],
//             ['id' => 9, 'title' => 'Top Gun','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 1986","banner"=>"https://fr.web.img6.acsta.net/pictures/15/06/12/12/58/422779.jpg"],
//             ['id' => 10, 'title' => 'Suzume','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2022","banner"=>"https://cinedweller.com/wp-content/uploads/2023/04/suzume-affiche.jpg.webp"],
//             ['id' => 11 ,'title' => 'Tunnel to Summer','rated'=>5,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2022","banner"=>"https://m.media-amazon.com/images/S/pv-target-images/d050e35f978249565b0ede8e65b55dcabd714613c02e65fdb5bcb1a85516a6ad.jpg"],




//         ]
    }

    public function index()
    {
        return view('movies.index', [
            'movies' => $this->getMovies()
        ]);
    }

     public function admin()
    {
        return view('movies.create',);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
                  'title' => ['required','unique:movies', 'max:255'],
                'Released' => ['required', 'max:255'],
                'rated' => ['required','integer','min:0','max:5'],
                'banner' => ['required','string']

              ]);
              Movie::create($validated);
    
    return redirect('/movies');
    }
     public function delete(Request $request , $id)
    {
       $record = Movie::find($id); 

        if ($record) {
            $record->delete();
        }
            
    
    return redirect('/movies');
    }

     public function update(Request $request )
    {

        $id = $request->input('id'); // https://laravel.com/docs/13.x/requests#retrieving-input
        echo $id;
         $validated = $request->validate([
                  'title' => ['required','unique:movies', 'max:255'],
                'Released' => ['required', 'max:255'],
                'rated' => ['required','integer','min:0','max:5'],
                'banner' => ['required','string']

              ]);
       $record = Movie::find($id); 

        if ($record) {
            $record->update($validated);
                return redirect('/movies');

        }
            
    
    }

    public function edit(Request $request , $id)
    {
       $movie = Movie::find($id); 

    
        return view('movies.edit', [
                    'movie' => $movie
                ]);    }
    public function show($id)
    { 

        $movies = $this->getMovies(); // un peu comme this.getMovies() , l'apelle de methode est different sur php avec -> a la place d'un .
        $movie = collect($movies)->firstWhere('id', $id);
        if(!$movie) {
                            return redirect('/movies');

        }
        return view('movies.show', [
            'movie' => $movie
        ]);
    }
}
