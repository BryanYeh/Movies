<?php
namespace Controllers;

use Core\View;
use Core\Controller;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
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
        View::renderTemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::renderTemplate('footer', $data);
    }
}
