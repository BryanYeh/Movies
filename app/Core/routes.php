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

/** Define User routes. */

Router::any('', 'Controllers\Home@index');

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

Router::any('genre/(:any)', 'Controllers\Movies@genre');
Router::any('genre/(:any)/(:num)', 'Controllers\Movies@genre');

Router::any('movie/(:any)','Controllers\Movies@movie');

Router::any('actors','Controllers\Selection@actor');
Router::any('genres','Controllers\Selection@genre');
Router::any('languages','Controllers\Selection@language');
Router::any('origin','Controllers\Selection@origin');
Router::any('years','Controllers\Selection@year');
Router::any('ratings','Controllers\Selection@rating');

/** Define Admin routes. */
Router::any('admin/movies', 'Controllers\admin\Movies@index');
Router::any('admin/movies/(:num)', 'Controllers\admin\Movies@index');
Router::any('admin/movie/add','Controllers\admin\Movies@add');
Router::any('admin/movie/delete/(:num)', 'Controllers\admin\Movies@remove');
Router::any('admin/movie/edit/(:any)', 'Controllers\admin\Movies@edit');

/** Admin Actors */
Router::any('admin/actors', 'Controllers\admin\Movies@index');
Router::any('admin/actors/(:num)', 'Controllers\admin\Movies@index');
Router::any('admin/actor/add','Controllers\admin\Movies@add');
Router::any('admin/actor/delete/(:num)', 'Controllers\admin\Movies@remove');

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = false;

/** Execute matched routes. */
Router::dispatch();
