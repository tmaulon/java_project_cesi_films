<?php
namespace App\Entity;

class MovieException extends \Exception{}
class Movie
{
    private $id;
    private $title;
    private $title_fr;
    private $year;
    private $score;
    private $id_director;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return void
     * @throws MovieException
     */
    public function setTitle( string $title ): void
    {
        if ( strlen($title) < 1 )
        {
            throw new MovieException('Film title too short !');
        }
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitleFr()
    {
        return $this->title_fr;
    }

    /**
     * @param mixed $title_fr
     */
    public function setTitleFr(string $title_fr): void
    {
        $this->title_fr = $title_fr;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @throws MovieException
     */
    public function setYear(int $year): void
    {
        if($year < 1890)
        {
            throw new MovieException('Movie year is too old!');
        }
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getDirectorId()
    {
        return $this->id_director;
    }

    /**
     * @param mixed $id_director
     */
    public function setDirectorId(int $id_director): void
    {
        $this->id_director = $id_director;
    }

    public static function fromPost($data): Movie
    {
        $m = new Movie();
        /*$m->setId(intval($data['id']));*/
        $m->setTitle($data['title']);
        $m->setTitleFr($data['title_fr']);
        $m->setYear($data['year']);
        $m->setScore($data['score']);
        return $m;
    }

}
