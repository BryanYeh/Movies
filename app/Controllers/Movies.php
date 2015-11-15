<?php
namespace Controllers;

use Core\View,
    Core\Controller,
    Models\Movies as MovieList,
    Core\Error;

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
     * Define main movie and load views
     *
     * @param int $page page number
     */
    public function index($page=1)
    {
        $data['page']=$page;

        $movies = new MovieList();
        $movieList = $movies->getMovieList($page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['movies'] = $movieList;

        $this->renderViews($data);
    }

    /**
     * Define movie by year and load views
     *
     * @param int $year movie year ex. 1999
     * @param int $page page number
     */
    public function year($year,$page=1)
    {
        if(intval($year)<1500 || intval($year)>intval(date('Y'))+1 ||intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['year'] = $year;

        $movies = new MovieList();
        $movieList = $movies->getYearList($year,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['movies'] = $movieList;

        $this->renderViews($data);
    }

    /**
     * Define movie by actors and load views
     *
     * @param string $actor actor with hyphens instead of spaces ex. john-doe
     * @param int $page page number
     */
    public function actor($actor,$page=1)
    {
        if($actor=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['actor'] = $actor;

        $movies = new MovieList();
        $movieList = $movies->getActorList($actor,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['movies'] = $movieList;

        $this->renderViews($data);
    }

    /**
     * Define movie by country of origin and load views
     *
     * @param string $country country of origin with hyphens instead of spaces ex. united-states-of-america
     * @param int $page page number
     */
    public function country($country,$page=1)
    {
        if($country=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['country'] = $country;

        $movies = new MovieList();
        $movieList = $movies->getCountryList($country,$page);

        if(sizeof($movieList)<1)
            Error::error404();
        $data['movies'] = $movieList;

        $this->renderViews($data);
    }

    /**
     * Define movie by rating and load views
     *
     * @param string $rating rating
     * @param int $page page number
     */
    public function rating($rating,$page=1)
    {
        if($rating=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['rating'] = $rating;

        $movies = new MovieList();
        $movieList = $movies->getRatingList($rating,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['movies'] = $movieList;

        $this->renderViews($data);
    }

    /**
     * Define movie by language and load views
     *
     * @param string $language
     * @param int $page page number
     */
    public function language($language,$page=1)
    {
        if($language=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['language'] = $language;

        $movies = new MovieList();
        $movieList = $movies->getLanguageList($language,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['movies'] = $movieList;

        $this->renderViews($data);

    }

    /*
     * Renders views only for this controller
     * @param array $data array of data
     */
    private function renderViews($data){
//        View::renderTemplate('header', $data);
        View::render('movies/movies', $data);
//        View::renderTemplate('footer', $data);
    }
}
