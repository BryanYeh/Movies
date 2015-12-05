<?php
namespace Models;

use Core\Model;

/**
 * Class Movies
 * @package Models
 */
class Movies extends Model
{
    private $moviesql, $yearsql, $actorsql, $countrysql, $languagesql, $ratingsql, $genresql;

    /**
     * Call the parent construct
     */
    function __construct()
    {
        parent::__construct();
        $this->moviesql = 'SELECT * FROM ' . PREFIX . 'movie';
        $this->yearsql = 'SELECT ' . PREFIX . 'movie.title,
                       ' . PREFIX . 'movie.description,
                       ' . PREFIX . 'movie.seoname
                       FROM  ' . PREFIX . 'movie_year
                       INNER JOIN  ' . PREFIX . 'movie
                       ON  ' . PREFIX . 'movie.id =  ' . PREFIX . 'movie_year.movie_id
                       INNER JOIN ' . PREFIX . 'yr
                       ON ' . PREFIX . 'yr.id = ' . PREFIX . 'movie_year.year_id
                       WHERE  ' . PREFIX . 'yr.yr=:yr';
        $this->actorsql = 'SELECT ' . PREFIX . 'movie.title,
                                          ' . PREFIX . 'movie.description,
                                          ' . PREFIX . 'movie.seoname
                                    FROM  ' . PREFIX . 'movie_actor
                                    INNER JOIN  ' . PREFIX . 'movie
                                    ON  ' . PREFIX . 'movie.id =  ' . PREFIX . 'movie_actor.movie_id
                                    INNER JOIN ' . PREFIX . 'actor
                                    ON ' . PREFIX . 'actor.id = ' . PREFIX . 'movie_actor.actor_id
                                    WHERE  ' . PREFIX . 'actor.actorseo=:actor';
        $this->genresql = 'SELECT ' . PREFIX . 'movie.title,
                                          ' . PREFIX . 'movie.description,
                                          ' . PREFIX . 'movie.seoname
                                    FROM  ' . PREFIX . 'movie_genre
                                    INNER JOIN  ' . PREFIX . 'movie
                                    ON  ' . PREFIX . 'movie.id =  ' . PREFIX . 'movie_genre.movie_id
                                    INNER JOIN ' . PREFIX . 'genre
                                    ON ' . PREFIX . 'genre.id = ' . PREFIX . 'movie_genre.genre_id
                                    WHERE  ' . PREFIX . 'genre.seogenre=:genre';
        $this->countrysql  = 'SELECT ' . PREFIX . 'movie.title,
                                          ' . PREFIX . 'movie.description,
                                          ' . PREFIX . 'movie.seoname
                                    FROM  ' . PREFIX . 'movie_origin
                                    INNER JOIN  ' . PREFIX . 'movie
                                    ON  ' . PREFIX . 'movie.id =  ' . PREFIX . 'movie_origin.movie_id
                                    INNER JOIN ' . PREFIX . 'origin
                                    ON ' . PREFIX . 'origin.id = ' . PREFIX . 'movie_origin.origin_id
                                    WHERE  ' . PREFIX . 'origin.countryseo=:country';
        $this->languagesql = 'SELECT ' . PREFIX . 'movie.title,
                                          ' . PREFIX . 'movie.description,
                                          ' . PREFIX . 'movie.seoname
                                    FROM  ' . PREFIX . 'movie_languages
                                    INNER JOIN  ' . PREFIX . 'movie
                                    ON  ' . PREFIX . 'movie.id =  ' . PREFIX . 'movie_languages.movie_id
                                    INNER JOIN ' . PREFIX . 'language
                                    ON ' . PREFIX . 'language.id = ' . PREFIX . 'movie_languages.language_id
                                    WHERE  ' . PREFIX . 'language.languageseo=:language';
        $this->ratingsql = 'SELECT ' . PREFIX . 'movie.title,
                                          ' . PREFIX . 'movie.description,
                                          ' . PREFIX . 'movie.seoname
                                    FROM  ' . PREFIX . 'movie_rating
                                    INNER JOIN  ' . PREFIX . 'movie
                                    ON  ' . PREFIX . 'movie.id =  ' . PREFIX . 'movie_rating.movie_id
                                    INNER JOIN ' . PREFIX . 'rating
                                    ON ' . PREFIX . 'rating.id = ' . PREFIX . 'movie_rating.rating_id';
    }

    /**
     * Gets movies from database
     *
     * @param int $page current page number
     *
     * @return list of movies
     */
    public function getMovieList($page)
    {
        return $this->db->select($this->moviesql . ' LIMIT ' . ($page * 20 - 20) . ',20');
    }

    /*
     * Gets number of pages for movies
     *
     * @return int number of pages total
     */
    public function getMoviePages()
    {
        return intval(ceil(sizeof($this->db->select($this->moviesql)) / 20.0));
    }

    /**
     * Gets movies by year
     *
     * @param int $year year
     * @param int $page current page number
     *
     * @returns list of movies
     */
    public function getYearList($year, $page)
    {
        return $this->db->select($this->yearsql . ' LIMIT ' . ($page * 20 - 20) . ',20', array(":yr" => $year));
    }

    /*
     * Gets number of pages for movies by year
     *
     * @return int number of pages total
     */
    public function getYearPages($year)
    {
        return intval(ceil(sizeof($this->db->select($this->yearsql, array(":yr" => $year))) / 20.0));
    }

    /**
     * Gets movies by actor
     *
     * @param string $actor actor name hypens instead of spaces
     * @param int $page current page number
     *
     * @return list of movies
     */
    public function getActorList($actor, $page)
    {
        return $this->db->select($this->actorsql.' LIMIT ' . ($page * 20 - 20) . ',20', array(":actor" => $actor));
    }

    /*
     * Gets number of pages for movies by actor
     *
     * @return int number of pages total
     */
    public function getActorPages($actor)
    {
        return intval(ceil(sizeof($this->db->select($this->actorsql, array(":actor" => $actor))) / 20.0));
    }

    /**
     * Gets movies by country of origin
     *
     * @param string $country country of origin use hypens instead of spaces
     * @param int $page current page number
     *
     * @returns list of movies
     */
    public function getCountryList($country, $page)
    {
        return $this->db->select($this->countrysql.' LIMIT ' . ($page * 20 - 20) . ',20', array(":country" => $country));
    }

    /*
     * Gets number of pages for movies by country
     *
     * @return int number of pages total
     */
    public function getCountryPages($country)
    {
        return intval(ceil(sizeof($this->db->select($this->countrysql , array(":country" => $country))) / 20.0));
    }

    /**
     * Gets movies by ratings
     *
     * @param string $rating rating with hypens not spaces
     * @param int $page current page number
     *
     * @return list of movies
     */
    public function getRatingList($rating, $page)
    {
        return $this->db->select($this->ratingsql. ' LIMIT ' . ($page * 20 - 20) . ',20', array(":rating" => $rating));
    }

    /*
     * Gets number of pages for movies by rating
     *
     * @return int number of pages total
     */
    public function getRatingPages($rating)
    {
        return intval(ceil(sizeof($this->db->select($this->ratingsql, array(":rating" => $rating))) / 20.0));
    }

    /**
     * Gets movies by genre
     *
     * @param string $genre genre with hypens not spaces
     * @param int $page current page number
     *
     * @return list of movies
     */
    public function getGenreList($genre, $page)
    {
        return $this->db->select($this->genresql. ' LIMIT ' . ($page * 20 - 20) . ',20', array(":genre" => $genre));
    }

    /*
     * Gets number of pages for movies by grenre
     *
     * @return int number of pages total
     */
    public function getGenrePages($genre)
    {
        return intval(ceil(sizeof($this->db->select($this->genresql, array(":genre" => $genre))) / 20.0));
    }

    /**
     * Gets movies by language
     *
     * @param string $language language with hyphens not spaces
     * @param $page current page number
     *
     * @return list of movies
     */
    public function getLanguageList($language, $page)
    {
        return $this->db->select($this->languagesql.' LIMIT ' . ($page * 20 - 20) . ',20', array(":language" => $language));
    }

    /*
     * Gets number of pages for movies by rating
     *
     * @return int number of pages total
     */
    public function getLanguagePages($language)
    {
        return intval(ceil(sizeof($this->db->select($this->languagesql, array(":language" => $language))) / 20.0));
    }


    /**
     * Gets movie information
     *
     * @param string movie movie seo
     *
     * @return list of movie info
     */
    public function getMovieInfo($movie)
    {

        return $this->db->select('SELECT
                ' . PREFIX . 'movie.title AS movietitle,
                ' . PREFIX . 'movie.description AS moviedescription,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'actor.actor) AS actors,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'actor.actorseo) AS actorsseo,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'genre.genre) AS genres,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'genre.seogenre) AS genresseo,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'language.lang) AS languagess,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'language.languageseo) AS langsseo,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'origin.country) AS origins,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'origin.countryseo) AS originsseo,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'rating.rating) AS ratings,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'rating.seorating) AS ratingsseo,
                ' . PREFIX . 'group_concat(DISTINCT ' . PREFIX . 'yr.yr) AS yr
                FROM `movie`
                INNER JOIN ' . PREFIX . 'movie_actor
                ON ' . PREFIX . 'movie.id = ' . PREFIX . 'movie_actor.movie_id
                INNER JOIN ' . PREFIX . 'actor
                ON ' . PREFIX . 'actor.id = ' . PREFIX . 'movie_actor.actor_id
                INNER JOIN ' . PREFIX . 'movie_genre
                ON ' . PREFIX . 'movie.id = ' . PREFIX . 'movie_genre.movie_id
                INNER JOIN ' . PREFIX . 'genre
                ON ' . PREFIX . 'genre.id = ' . PREFIX . 'movie_genre.genre_id
                INNER JOIN ' . PREFIX . 'movie_languages
                ON ' . PREFIX . 'movie.id = ' . PREFIX . 'movie_languages.movie_id
                INNER JOIN ' . PREFIX . 'language
                ON ' . PREFIX . 'language.id = ' . PREFIX . 'movie_languages.language_id
                INNER JOIN ' . PREFIX . 'movie_origin
                ON ' . PREFIX . 'movie.id = ' . PREFIX . 'movie_origin.movie_id
                INNER JOIN ' . PREFIX . 'origin
                ON ' . PREFIX . 'origin.id = ' . PREFIX . 'movie_origin.origin_id
                INNER JOIN ' . PREFIX . 'movie_rating
                ON ' . PREFIX . 'movie.id = ' . PREFIX . 'movie_rating.movie_id
                INNER JOIN ' . PREFIX . 'rating
                ON ' . PREFIX . 'rating.id = ' . PREFIX . 'movie_rating.rating_id
                INNER JOIN ' . PREFIX . 'movie_year
                ON ' . PREFIX . 'movie.id = ' . PREFIX . 'movie_year.movie_id
                INNER JOIN ' . PREFIX . 'yr
                ON ' . PREFIX . 'yr.id = ' . PREFIX . 'movie_year.year_id
                WHERE ' . PREFIX . 'movie.seoname LIKE :movie', array(":movie" => $movie));
    }

    public function insert($table,$data)
    {
        return $this->db->insert(PREFIX.$table,$data);
    }

    public function remove($table, $data)
    {
        return $this->db->delete($table,$data);
    }
}