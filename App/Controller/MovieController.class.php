<?php


namespace App\Controller;


use App\Layout;

class MovieController
{
    private $layout;
    private $movies = [
        [
            'id' => 1,
            'title' => 'Fenêtre sur Cour',
            'year' => 1954,
            'fiche' => 'http://www.allocine.fr/film/fichefilm_gen_cfilm=983.html',
        ],
        [
            'id' => 2,
            'title' => 'Diamant sur Canapé',
            'year' => 1961,
            'fiche' => 'http://www.allocine.fr/film/fichefilm_gen_cfilm=2736.html',
        ],
    ];

    public function __construct()
    {
        $this->layout = new Layout('base');
    }

    public function list()
    {
        $html = $this->layout->render('movies', [
            'movies' => $this->movies,
        ]);
        echo $html;
    }

/*    public function detail()
    {
        $html = $this->layout->render('movie-detail', [
            'movie_id' => $this->movies,
        ]);
        echo $html;
    }*/

}
