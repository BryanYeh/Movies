<div class="col-xs-12">
    <div class="row">
        <h1><?php echo $data['movietitle'];?>
            <small>
                (<a href="<?php echo DIR."year/".$data['yr'];?>">
                    <?php echo $data['yr'];?>
                </a>)
            </small>
        </h1>
    </div>
    <div class="row">
        Rated: <a href="<?php echo DIR."rating/".$data['ratingsseo'];?>">
                    <?php echo $data['ratings'];?>
                </a> |
        Country of Origin: <a href="<?php echo DIR."origin/".$data['originsseo'];?>">
                                <?php echo $data['origins'];?>
                            </a> |
        Genres:
        <?php
        $genres = explode(',',$data['genres']);
        $genresseos = explode(',',$data['genresseo']);
        for($i = 0; $i < sizeof($genres); $i++){
            if($i > 0){
                echo ", ";
            }
        ?>
            <a href="<?php echo DIR."genre/".$genresseos[$i];?>">
                <?php echo $genres[$i];?>
            </a>
        <?php
        }
        ?> |
        Languages:
        <?php
        $languages = explode(',',$data['languagess']);
        $langsseo = explode(',',$data['langsseo']);
        for($i = 0; $i < sizeof($languages); $i++){
            if($i > 0){
                echo ", ";
            }
            ?>
            <a href="<?php echo DIR."language/".$langsseo[$i];?>">
                <?php echo $languages[$i];?>
            </a>
            <?php
        }
        ?>
    </div>
    <div class="col-md-4">
        movie image
    </div>
    <div class="col-md-6">
        <p><?php echo $data['moviedescription']; ?></p>
        <p>Actors:
            <ul>
                <?php
                $actor = explode(',',$data['actors']);
                $actorseo = explode(',',$data['actorsseo']);
                for($i = 0; $i < sizeof($actor); $i++){
                    ?>
                    <li><a href="<?php echo DIR."actor/".$actorseo[$i];?>"><?php echo $actor[$i];?></a></li>
                    <?php
                }
                ?>

            </ul>
        </p>
    </div>
</div>