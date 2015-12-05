<div class="row">
    <div class="col-xs-12">
        <h1>Ratings</h1>
    </div>
</div>

<div class="row">
    <?php
    foreach ($data['selection'] as $selection) {
        ?>
        <div class="col-md-3">
            <a href="<?php echo DIR."rating/".$selection->seorating;?>">
                <div class="well well-lg">
                    <?php echo $selection->rating;?>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>