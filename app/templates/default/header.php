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

<!--TODO:navbar-->
<nav class="navbar">
	<ul>
		<li><a href="<?php echo DIR;?>movies/">Movies</a></li>
		<li><a href="<?php echo DIR;?>actors">Actor</a></li>
		<li><a href="<?php echo DIR;?>genres">Genre</a></li>
		<li><a href="<?php echo DIR;?>languages">Language</a></li>
		<li><a href="<?php echo DIR;?>origin">Country of Origin</a></li>
		<li><a href="<?php echo DIR;?>years">Year</a></li>
		<li><a href="<?php echo DIR;?>ratings">Rating</a></li>
	</ul>
</nav>
<div class="container">
