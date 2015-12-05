<div class="row">
    <div class="col-xs-12">
        <h1>Languages</h1>
    </div>
</div>

<div class="row">
    <?php
    foreach ($data['selection'] as $selection) {
        ?>
        <div class="col-md-3">
            <a href="<?php echo DIR."language/".$selection->languageseo;?>">
                <div class="well well-lg">
                    <?php echo $selection->lang;?>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>