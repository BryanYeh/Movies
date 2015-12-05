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

</div>

<!-- JS -->
<?php
Assets::js(array(
	Url::templatePath() . 'js/jquery.js',
	Url::templatePath() . 'js/bootstrap.min.js'
));

//hook for plugging in javascript
$hooks->run('js');

//hook for plugging in code into the footer
$hooks->run('footer');
?>
<div class="container">
<hr>

<footer>
	A simple mini IMDB built with SimpleMVCFramework 2.2.
</footer>
</div>
</body>
</html>
