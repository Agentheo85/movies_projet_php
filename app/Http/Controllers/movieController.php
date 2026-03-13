<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class movieController extends Controller
{
    private function getMovies()
    {
        return [
            ['id' => 1, 'title' => 'Les triangles des bermunesss','rated'=>4,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2009"],
            ['id' => 2, 'title' => 'Jurasic Park','rated'=>4,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2009"],
            ['id' => 3, 'title' => 'Retour vers le futur','rated'=>4,'description'=>'bla bla bla c un bon film tqt pas',"Released"=>"12 dec 2009"],
        ];
    }

    public function index()
    {
        return view('movies.index', [
            'movies' => $this->getMovies()
        ]);
    }

    public function show($id)
    {
        info($id);

        $articles = $this->getMovies();
        $article = collect($articles)->firstWhere('id', $id);

        return view('articles.show', [
            'article' => $article
        ]);
    }
}

