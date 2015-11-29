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
     * List of Movies Pages
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


        $data['pages']=$movies->getMoviePages();
        $data['title'] = "Movies Page ".$page." of ".$data['pages'];
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

        $data['pages'] = $movies->getYearPages($year);
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
        $actor = str_replace(" ", "", strip_tags($actor));
        if($actor=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['actor'] = $actor;

        $movies = new MovieList();
        $movieList = $movies->getActorList($actor,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['pages'] = $movies->getActorPages($actor);
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
        $country = str_replace(" ", "", strip_tags($country));
        if($country=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['country'] = $country;

        $movies = new MovieList();
        $movieList = $movies->getCountryList($country,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['pages'] = $movies->getCountryPages($country);
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
        $rating = str_replace(" ", "", strip_tags($rating));
        if($rating=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['rating'] = $rating;

        $movies = new MovieList();
        $movieList = $movies->getRatingList($rating,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['pages'] = $movies->getRatingPages($rating);
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
        $language = str_replace(" ", "", strip_tags($language));
        if($language=="" || intval($page)<1)
            Error::error404();

        $data['page'] = $page;
        $data['language'] = $language;

        $movies = new MovieList();
        $movieList = $movies->getLanguageList($language,$page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['pages'] = $movies->getLanguagePages($language);
        $data['movies'] = $movieList;

        $this->renderViews($data);

    }

    /**
     * Single Movie Page
     *
     * @param string $movie movie seo term
     */
    public function movie($movie){
        $movie = str_replace(" ", "", strip_tags($movie));
        if($movie=="")
            Error::error404();

        $movies = new MovieList();
        $info = $movies->getMovieInfo($movie);

        if(sizeof($info)<1)
            Error::error404();

        $data['title'] = $info[0]->movietitle;
        foreach($info[0] as $k => $v){
            $data[$k] = $v;
        }
        $this->renderViews($data,"movie");
//
    }

    /**
     * Renders views only for this controller
     *
     * @param array $data array of data
     * @param string $view what page to render
     */
    private function renderViews($data,$view='movies'){
        View::renderTemplate('header', $data);
        View::render('movies/'.$view, $data);
//        View::renderTemplate('footer', $data);
    }
}
