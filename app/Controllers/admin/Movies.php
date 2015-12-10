<?php


namespace Controllers\admin;


use Core\View,
    Core\Controller,
    Core\Error,
    Models\Selections,
    Models\Movies as MMovies,
    Helpers\Url;

class Movies extends Controller
{
    private $selections;
    private $movies;

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();

        $this->selections = new Selections();
        $this->movies = new MMovies();
    }

    public function index($page=1)
    {

        $data['page']=$page;

        $movieList = $this->movies->getMovieList($page);

        if(sizeof($movieList)<1)
            Error::error404();

        $data['pages']=$this->movies->getMoviePages();
        $data['movies'] = $movieList;
        $data['title'] = "Movies";

        View::render('admin/header', $data);
        View::render('admin/movies', $data);
        View::renderTemplate('footer', $data);
    }

    public function add()
    {
        $addedSuccess = false;
        if (isset($_POST['submit'])) {

            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $seo = isset($_POST['seo']) ? URL::generateSafeSlug($_POST['seo']) : URL::generateSafeSlug($title);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $actors = isset($_POST['actor']) ? $_POST['actor'] : array();
            $genres = isset($_POST['genre']) ? $_POST['genre'] : array();
            $rating = $_POST['rating'];
            $languages = isset($_POST['language']) ? $_POST['language'] : array();
            $year = $_POST['year'];
            $origin = $_POST['origin'];

            $error = array();
            if ($title == '') {
                $error['title'] = 'Title is missing';
            }
            if ($description == '') {
                $error['description'] = 'Description is missing';
            }

            if ($seo == '' && $title == '') {
                $error['seo'] = 'SEO term is missing';
            } else {
                $seo = $this->selections->compareSEO($seo);
            }
            if (empty($actors)) {
                $error['actor'] = 'Actor is missing';
            }
            if (empty($genres)) {
                $error['genre'] = 'Genre is missing';
            }
            if ($rating == '') {
                $error['rating'] = 'Rating is missing';
            }
            if (empty($languages)) {
                $error['language'] = 'Language is missing';
            }
            if ($year == '') {
                $error['year'] = 'Year is missing';
            }
            if ($origin == '') {
                $error['origin'] = 'Country of Origin is missing';
            }

            if (empty($error)) {


                //movie
                $post_data = array(
                    'title' => $title,
                    'seoname' => $seo,
                    'description' => $description
                );
                $movie_id = $this->movies->insert('movie', $post_data);

                //rating
                $post_data = array(
                    'movie_id' => $movie_id,
                    'rating_id' => $rating
                );
                $this->movies->insert('movie_rating', $post_data);

                //country of origin
                $post_data = array(
                    'movie_id' => $movie_id,
                    'origin_id' => $origin
                );
                $this->movies->insert('movie_origin', $post_data);

                //year
                $post_data = array(
                    'movie_id' => $movie_id,
                    'year_id' => $year
                );
                $this->movies->insert('movie_year', $post_data);

                //actor
                foreach ($actors as $actor) {
                    $post_data = array(
                        'movie_id' => $movie_id,
                        'actor_id' => $actor
                    );
                    $this->movies->insert('movie_actor', $post_data);
                }

                //genres
                foreach ($genres as $genre) {
                    $post_data = array(
                        'movie_id' => $movie_id,
                        'genre_id' => $genre
                    );
                    $this->movies->insert('movie_genre', $post_data);
                }

                //language
                foreach ($languages as $language) {
                    $post_data = array(
                        'movie_id' => $movie_id,
                        'language_id' => $language
                    );
                    $this->movies->insert('movie_languages', $post_data);
                }

                $addedSuccess = true;
            }

        }

        $data['title'] = "Add Movies";

        $data['actors'] = $this->selections->getActors();
        $data['genres'] = $this->selections->getGenres();
        $data['languages'] = $this->selections->getLanguages();
        $data['origins'] = $this->selections->getOrigin();
        $data['ratings'] = $this->selections->getRatings();
        $data['years'] = $this->selections->getYears();
        $data['success'] = $addedSuccess ? "Movie added" : "";


        View::render('admin/header', $data);
        View::render('admin/addmovie', $data);
        View::renderTemplate('footer', $data);
    }

    public function delete($id)
    {
        $this->movies->insert('movie', ['id'=>$id]);
    }
}