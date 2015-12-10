<?php
/**
 * Sample layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

    <!-- Site meta -->
    <meta charset="utf-8">
    <?php
    //hook for plugging in meta tags
    $hooks->run('meta');
    ?>
    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

    <!-- CSS -->
    <?php
    Assets::css(array(
        Url::templatePath() . 'css/bootstrap.min.css',
        Url::templatePath() . 'css/style.css',
    ));

    //hook for plugging in css
    $hooks->run('css');
    ?>

</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo DIR;?>">Mini IMDB</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo DIR;?>admin/movies/">Movies</a></li>
                <li><a href="<?php echo DIR;?>admin/actors">Actors</a></li>
                <li><a href="<?php echo DIR;?>admin/genres">Genres</a></li>
                <li><a href="<?php echo DIR;?>admin/languages">Languages</a></li>
                <li><a href="<?php echo DIR;?>admin/origin">Countries of Origin</a></li>
                <li><a href="<?php echo DIR;?>admin/years">Years</a></li>
                <li><a href="<?php echo DIR;?>admin/ratings">Ratings</a></li>
                <li><a href="<?php echo DIR;?>admin/ratings">Login/Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
