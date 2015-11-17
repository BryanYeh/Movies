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
        $this->renderViews($data);
    }

    /** Define genres */
    public function genre()
    {
        $selection = new Selections();
        $selectionList = $selection->getGenres();
        $data['selection'] = $selectionList;
        $this->renderViews($data);
    }

    /** Define languages */
    public function language()
    {
        $selection = new Selections();
        $selectionList = $selection->getLanguages();
        $data['selection'] = $selectionList;
        $this->renderViews($data);
    }

    /** Define country of origin */
    public function origin()
    {
        $selection = new Selections();
        $selectionList = $selection->getOrigin();
        $data['selection'] = $selectionList;
        $this->renderViews($data);
    }

    /** Define years */
    public function year()
    {
        $selection = new Selections();
        $selectionList = $selection->getYears();
        $data['selection'] = $selectionList;
        $this->renderViews($data);
    }

    /** Define ratings */
    public function rating()
    {
        $selection = new Selections();
        $selectionList = $selection->getRatings();
        $data['selection'] = $selectionList;
        $this->renderViews($data);
    }

    /**
     * Renders views only for this controller
     *
     * @param array $data array of data
     */
    private function renderViews($data){
        View::renderTemplate('header', $data);
        View::render('movies/selection', $data);
//        View::renderTemplate('footer', $data);
    }
}