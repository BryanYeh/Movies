<?php
namespace Controllers;

use Core\View,
    Core\Controller;


class Home extends Controller
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
    public function index()
    {
        $data['title'] = "home page";
        View::renderTemplate('header', $data);
        View::render('movies/homepage', $data);
        View::renderTemplate('footer', $data);
    }
}
