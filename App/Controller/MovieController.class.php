<?php


namespace App\Controller;


use App\Entity\Movie;
use App\Entity\MovieException;
use App\Layout;
use App\Utils\DB;
use App\Utils\DBException;

class MovieController
{
    private $layout;
    private $db;
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
        $this->db = new DB();
        $this->layout = new Layout('base');
    }

    public function list()
    {
        $this->db->query('SELECT F.id, F.id_director, F.title, F.title_fr, F.year, F.score FROM film AS F INNER JOIN director ON F.id_director = director.id ');
        $movies = $this->db->result('App\\Entity\\Movie');

        $html = $this->layout->render('movies', [
            'movies' => $movies,
        ]);
        /*echo $this->layout->render('movies', [
            'movies' => $movies,
        ]);*/
        echo $html;
    }

   public function update()
    {
        $this->db->query('SELECT F.id, F.id_director, F.title, F.title_fr, F.year, F.score FROM film AS F INNER JOIN director ON F.id_director = director.id WHERE F.id =' . $_GET['id'] . ';');
        $this->db->execute();
        $movie = $this->db->result('App\\Entity\\Movie');

        $html = $this->layout->render('movie-update', [
            'movie' => $movie,
        ]);
        echo $html;
    }

    public function detail()
    {
        $this->db->query('SELECT F.id, F.id_director, F.title, F.title_fr, F.year, F.score FROM film AS F INNER JOIN director ON F.id_director = director.id WHERE F.id =' . $_GET['id'] . ';');
        $this->db->execute();
        $movie = $this->db->result('App\\Entity\\Movie');

        $html = $this->layout->render('movie-detail', [
            'movie' => $movie,
        ]);
        echo $html;
    }

    public function createFilmView()
    {
        $html = $this->layout->render('movie-create', []);
        echo $html;
    }
    public function addFilm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($_POST) > 0)
        {
            $movie = Movie::fromPost($_POST);
            try
            {
                $this->db->query('INSERT INTO film (title, title_fr, year, score) VALUES (:title, :title_fr, :year, :score)');
                $this->db->bind('title', $movie->getTitle(), \PDO::PARAM_STR);
                $this->db->bind('title_fr', $movie->getTitleFr(), \PDO::PARAM_STR);
                $this->db->bind('year', $movie->getYear(), \PDO::PARAM_INT);
                $this->db->bind('score', $movie->getScore());
                $this->db->execute();
            }
            catch (MovieException $e)
            {
                header('HTTP/1.0. 400 Bad request');
                exit($e->getMessage());
            }
            catch (DBException $e)
            {
                header('HTTP/1.0. 400 Bad request');
                exit($e->getMessage());
            }
        }
        header('Location: /movies');
        exit();
    }


    public function updateFilmView()
    {
        $this->db->query('SELECT F.id, F.id_director, F.title, F.title_fr, F.year, F.score FROM film AS F INNER JOIN director ON F.id_director = director.id WHERE F.id =' . $_GET['id'] . ';');
        $this->db->execute();

        $movie = $this->db->result('App\\Entity\\Movie');

        $html = $this->layout->render('movie-update', [
            'movie' => $movie,
        ]);
        echo $html;
    }

    public function  updateFilm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($_POST) > 0)
        {
            $movie = Movie::fromPost($_POST);
            try
            {
                $this->db->query('UPDATE film SET title=:title, title_fr=:title_fr, year=:year, score=:score WHERE $_POST["id"] = film.id');
                $this->db->bind('title', $movie->getTitle(), \PDO::PARAM_STR);
                $this->db->bind('title_fr', $movie->getTitleFr(), \PDO::PARAM_STR);
                $this->db->bind('year', $movie->getYear(), \PDO::PARAM_INT);
                $this->db->bind('score', $movie->getScore());
                $this->db->execute();
            }
            catch (MovieException $e)
            {
                header('HTTP/1.0. 400 Bad request');
                exit($e->getMessage());
            }
            catch (DBException $e)
            {
                header('HTTP/1.0. 400 Bad request');
                exit($e->getMessage());
            }
        }
        header('Location: /movies');
        exit();

    }

}
