<?php

namespace Controllers;

use Core\View,
    Core\Controller,
    Models\Selections;

class Selection extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /** Define actors */
    public function actor()
    {
        $selection = new Selections();
        $selectionList = $selection->getActors();
        $data['selection'] = $selectionList;
        $data['title'] = "Actors";
        $this->renderViews($data,"actors");
    }

    /** Define genres */
    public function genre()
    {
        $selection = new Selections();
        $selectionList = $selection->getGenres();
        $data['selection'] = $selectionList;
        $data['title'] = "Genres";
        $this->renderViews($data,"genres");
    }

    /** Define languages */
    public function language()
    {
        $selection = new Selections();
        $selectionList = $selection->getLanguages();
        $data['selection'] = $selectionList;
        $data['title'] = "Languages";
        $this->renderViews($data,"languages");
    }

    /** Define country of origin */
    public function origin()
    {
        $selection = new Selections();
        $selectionList = $selection->getOrigin();
        $data['selection'] = $selectionList;
        $data['title'] = "Country of Origin";
        $this->renderViews($data,"origins");
    }

    /** Define years */
    public function year()
    {
        $selection = new Selections();
        $selectionList = $selection->getYears();
        $data['selection'] = $selectionList;
        $data['title'] = "Years";
        $this->renderViews($data,"years");
    }

    /** Define ratings */
    public function rating()
    {
        $selection = new Selections();
        $selectionList = $selection->getRatings();
        $data['selection'] = $selectionList;
        $data['title'] = "Ratings";
        $this->renderViews($data,"ratings");
    }

    /**
     * Renders views only for this controller
     *
     * @param array $data array of data
     */
    private function renderViews($data,$selection="selection"){
        View::renderTemplate('header', $data);
        View::render('movies/'.$selection, $data);
//        View::renderTemplate('footer', $data);
    }
}