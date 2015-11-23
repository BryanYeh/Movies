<?php

namespace Models;

use Core\Model;

class Selections extends Model
{
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Gets all genres
     *
     * @return list of genres
     */
    public function getGenres()
    {
        return $this->db->select('SELECT * FROM ' . PREFIX . 'genre');
    }

    /**
     * Gets all laguages
     *
     * @return list of languages
     */
    public function getLanguages()
    {
        return $this->db->select('SELECT * FROM ' . PREFIX . 'language');
    }

    /**
     * Gets all country of orgin
     *
     * @return list of countries
     */
    public function getOrigin()
    {
        return $this->db->select('SELECT * FROM ' . PREFIX . 'origin');
    }

    /**
     * Gets all years
     *
     * @return list of years
     */
    public function getYears()
    {
        return $this->db->select('SELECT * FROM ' . PREFIX . 'yr');
    }

    /**
     * Gets all ratings
     *
     * @return list of rating
     */
    public function getRatings()
    {
        return $this->db->select('SELECT * FROM ' . PREFIX . 'rating');
    }

    /**
     * Gets all ratings
     *
     * @return list of rating
     */
    public function getActors()
    {
        return $this->db->select('SELECT * FROM ' . PREFIX . 'actor');
    }

    /**
     * Makes sure SEO term is unique
     *
     * @param string $term
     * @param int $num
     *
     * @return string seo term
     */
    public function compareSEO($term, $num = 1)
    {
        $size = sizeof($this->db->select('SELECT * FROM ' . PREFIX . 'movie WHERE seoname LIKE :term', array(":term" => $term)));

        if ($size > 0) {
            $term .= '-' . $num;
            return $this->compareSEO($term, $num++);
        } else {
            return $term;
        }

    }
}