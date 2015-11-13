<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date updated Sept 19, 2015
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Define routes. */
Router::any('', 'Controllers\Welcome@index');
Router::any('subpage', 'Controllers\Welcome@subPage');

Router::any('movies', 'Controllers\Movies@index');
Router::any('movies/(:num)', 'Controllers\Movies@index');

Router::any('year/(:num)', 'Controllers\Movies@year');
Router::any('year/(:num)/(:num)', 'Controllers\Movies@year');

Router::any('actor/(:any)', 'Controllers\Movies@actor');
Router::any('actor/(:any)/(:num)', 'Controllers\Movies@actor');

Router::any('origin/(:any)', 'Controllers\Movies@country');
Router::any('origin/(:any)/(:num)', 'Controllers\Movies@country');

Router::any('rating/(:any)', 'Controllers\Movies@rating');
Router::any('rating/(:any)/(:num)', 'Controllers\Movies@rating');

Router::any('language/(:any)', 'Controllers\Movies@language');
Router::any('language/(:any)/(:num)', 'Controllers\Movies@language');

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
