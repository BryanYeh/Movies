<div class="row">
    <div class="col-xs-12">
        <h1>Countries of Origin</h1>
    </div>
</div>

<div class="row">
    <?php
    foreach ($data['selection'] as $selection) {
        ?>
        <div class="col-md-3">
            <a href="<?php echo DIR."origin/".$selection->countryseo;?>">
                <div class="well well-lg">
                    <?php echo $selection->country;?>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>