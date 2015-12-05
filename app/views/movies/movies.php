<div class="row">
    <div class="col-xs-12">
        <h1><?php echo $data['header']; ?>  <small>Page <?php echo $data['page'].' of '.$data['pages']; ?></small></h1>
    </div>
</div>

<div class="row">
    <?php
    foreach ($data['movies'] as $movie) {
    ?>
    <div class="col-md-3">
        <a href="<?php echo DIR."movie/".$movie->seoname;?>">
            <div class="well well-lg">
                <?php echo $movie->title;?>
            </div>
        </a>
    </div>
    <?php
    }
    ?>
</div>

<nav>
    <ul class="pagination">
        <?php for($i=1; $i<=$data['pages']; $i++){ ?>
        <li><a href="<?php echo DIR."movies/".$i;?>"><?php echo $i;?></a></li>
        <?php } ?>
    </ul>
</nav>