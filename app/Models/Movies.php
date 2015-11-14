<?php
namespace Models;

use Core\Model;

/**
 * Class Movies
 * @package Models
 */
class Movies extends Model
{
    /*
     * TODO: all get movie functions needs to use page and limit it for use of pages
     */

    /**
     * Call the parent construct
     */
    function __construct(){
        parent::__construct();
    }

    /**
     * Gets movies from database
     *
     * @param int $page current page number
     *
     * @return list of movies
     */
    public function getMovieList($page){
        return $this->db->select('SELECT * FROM '.PREFIX.'movie');
    }

    /**
     * Gets movies by year
     *
     * @param int $year year
     * @param int $page current page number
     *
     * @returns list of movies
     */
    public function getYearList($year,$page){
        return $this->db->select('SELECT '.PREFIX.'movie.title,
                                          '.PREFIX.'movie.description,
                                          '.PREFIX.'movie.seoname
                                    FROM  '.PREFIX.'movie_year
                                    INNER JOIN  '.PREFIX.'movie
                                    ON  '.PREFIX.'movie.id =  '.PREFIX.'movie_year.movie_id
                                    INNER JOIN '.PREFIX.'yr
                                    ON '.PREFIX.'yr.id = '.PREFIX.'movie_year.year_id
                                    WHERE  '.PREFIX.'yr.yr=:yr',array(":yr"=>$year));
    }

    /**
     * Gets movies by actor
     *
     * @param string $actor actor name hypens instead of spaces
     * @param int $page current page number
     *
     * @return list of movies
     */
    public function getActorList($actor,$page){
        return $this->db->select('SELECT '.PREFIX.'movie.title,
                                          '.PREFIX.'movie.description,
                                          '.PREFIX.'movie.seoname
                                    FROM  '.PREFIX.'movie_actor
                                    INNER JOIN  '.PREFIX.'movie
                                    ON  '.PREFIX.'movie.id =  '.PREFIX.'movie_actor.movie_id
                                    INNER JOIN '.PREFIX.'actor
                                    ON '.PREFIX.'actor.id = '.PREFIX.'movie_actor.actor_id
                                    WHERE  '.PREFIX.'actor.actorseo=:actor',array(":actor"=>$actor));
    }

    /**
     * Gets movies by country of origin
     *
     * @param string $country country of origin use hypens instead of spaces
     * @param int $page current page number
     *
     * @returns list of movies
     */
    public function getCountryList($country,$page){
        return $this->db->select('SELECT '.PREFIX.'movie.title,
                                          '.PREFIX.'movie.description,
                                          '.PREFIX.'movie.seoname
                                    FROM  '.PREFIX.'movie_origin
                                    INNER JOIN  '.PREFIX.'movie
                                    ON  '.PREFIX.'movie.id =  '.PREFIX.'movie_origin.movie_id
                                    INNER JOIN '.PREFIX.'origin
                                    ON '.PREFIX.'origin.id = '.PREFIX.'movie_origin.origin_id
                                    WHERE  '.PREFIX.'origin.countryseo=:country',array(":country"=>$country));
    }

    /**
     * Gets movies by ratings
     *
     * @param string $rating rating with hypens not spaces
     * @param int $page current page number
     *
     * @return list of movies
     */
    public function getRatingList($rating,$page){
        return $this->db->select('SELECT '.PREFIX.'movie.title,
                                          '.PREFIX.'movie.description,
                                          '.PREFIX.'movie.seoname
                                    FROM  '.PREFIX.'movie_rating
                                    INNER JOIN  '.PREFIX.'movie
                                    ON  '.PREFIX.'movie.id =  '.PREFIX.'movie_rating.movie_id
                                    INNER JOIN '.PREFIX.'rating
                                    ON '.PREFIX.'rating.id = '.PREFIX.'movie_rating.rating_id
                                    WHERE  '.PREFIX.'rating.seorating=:rating',array(":rating"=>$rating));
    }

    /**
     * Gets movies by language
     *
     * @param string $language language with hyphens not spaces
     * @param $page current page number
     *
     * @return list of movies
     */
    public function getLanguageList($language,$page){
        return $this->db->select('SELECT '.PREFIX.'movie.title,
                                          '.PREFIX.'movie.description,
                                          '.PREFIX.'movie.seoname
                                    FROM  '.PREFIX.'movie_languages
                                    INNER JOIN  '.PREFIX.'movie
                                    ON  '.PREFIX.'movie.id =  '.PREFIX.'movie_languages.movie_id
                                    INNER JOIN '.PREFIX.'language
                                    ON '.PREFIX.'language.id = '.PREFIX.'movie_languages.language_id
                                    WHERE  '.PREFIX.'language.languageseo=:language',array(":language"=>$language));
    }
}