<div class="row">
    <div class="col-xs-12">
        <h1>Years</h1>
    </div>
</div>

<div class="row">
    <?php
    foreach ($data['selection'] as $selection) {
        ?>
        <div class="col-md-3">
            <a href="<?php echo DIR."year/".$selection->yr;?>">
                <div class="well well-lg">
                    <?php echo $selection->yr;?>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>