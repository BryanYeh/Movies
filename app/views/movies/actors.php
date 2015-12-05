<div class="row">
    <div class="col-xs-12">
        <h1>Actors</h1>
    </div>
</div>

<div class="row">
    <?php
    foreach ($data['selection'] as $selection) {
        ?>
        <div class="col-md-3">
            <a href="<?php echo DIR."actor/".$selection->actorseo;?>">
                <div class="well well-lg">
                    <?php echo $selection->actor;?>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>
