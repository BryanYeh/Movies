<?php
namespace Models;

use Core\Model;

class Movies extends Model
{
    function __construct(){
        parent::__construct();
    }

    public function getMovieList(){
        return $this->db->select('SELECT * FROM '.PREFIX.'movie');
    }

    public function getYearList($year){
        return $this->db->select('SELECT * FROM '.PREFIX.'year INNER JOIN movie ON year.id = movie.year_id WHERE year.year='.$year);
    }
}