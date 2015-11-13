<?php
namespace Controllers;

use Core\View;
use Core\Controller;
use Models\Movies as MovieList;

class Movies extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Define Index page title and load template files
     */
    public function index($page=1)
    {
        $data['page']=$page;

        $movies = new MovieList();
        $movieList = $movies->getMovieList($page);

        $data['movies'] = $movieList;
//        View::renderTemplate('header', $data);
        View::render('movies/movies', $data);
//        View::renderTemplate('footer', $data);
    }

    public function year($year=1999,$page=1)
    {
        $data['page'] = $page;
        $data['year'] = $year;
        $movies = new MovieList();
        $movieList = $movies->getYearList($year,$page);

        $data['movies'] = $movieList;
//        View::renderTemplate('header', $data);
        View::render('movies/movies', $data);
//        View::renderTemplate('footer', $data);
    }

    public function actor($actor="bad-ass",$page=1)
    {
        $data['page'] = $page;
        $data['actor'] = $actor;
        $movies = new MovieList();
        $movieList = $movies->getActorList($actor,$page);

        $data['movies'] = $movieList;
//        View::renderTemplate('header', $data);
        View::render('movies/movies', $data);
//        View::renderTemplate('footer', $data);
    }

    public function country($country="usa",$page=1)
    {
        $data['page'] = $page;
        $data['country'] = $country;
        $movies = new MovieList();
        $movieList = $movies->getCountryList($country,$page);

        $data['movies'] = $movieList;
//        View::renderTemplate('header', $data);
        View::render('movies/movies', $data);
//        View::renderTemplate('footer', $data);
    }

    public function rating($rating="r",$page=1)
    {
        $data['page'] = $page;
        $data['rating'] = $rating;
        $movies = new MovieList();
        $movieList = $movies->getRatingList($rating,$page);

        $data['movies'] = $movieList;
//        View::renderTemplate('header', $data);
        View::render('movies/movies', $data);
//        View::renderTemplate('footer', $data);
    }

    public function language($language="english",$page=1)
    {
        $data['page'] = $page;
        $data['language'] = $language;
        $movies = new MovieList();
        $movieList = $movies->getLanguageList($language,$page);

        $data['movies'] = $movieList;
//        View::renderTemplate('header', $data);
        View::render('movies/movies', $data);
//        View::renderTemplate('footer', $data);
    }
}
