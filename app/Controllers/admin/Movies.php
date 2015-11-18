<?php


namespace Controllers\admin;


use Core\View,
    Core\Controller,
    Models\Selections;

class Movies extends Controller
{
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Movies";

        $selections = new Selections();

        $data['actors'] = $selections->getActors();
        $data['genres'] = $selections->getGenres();
        $data['languages'] = $selections->getLanguages();
        $data['origins'] = $selections->getOrigin();
        $data['ratings'] = $selections->getRatings();
        $data['years'] = $selections->getYears();

        View::render('admin/movie', $data);
    }

    public function add()
    {

    }

    public function delete()
    {

    }
}