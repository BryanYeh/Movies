<div class="row">
    <div class="col-xs-12">
        <h1>Movies <small>Page <?php echo $data['page']; ?> of <?php echo $data['pages']; ?></small></h1>
        <a href="<?php echo DIR;?>admin/movie/add" class="btn btn-warning">Add Movie</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="well">
            <table class="table table-responsive">
                <thead>
                    <th>Delete</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                    <?php
                        foreach($data['movies'] as $movie) {
                            ?>
                            <tr>
                                <td><a href="<?php echo DIR;?>admin/movie/delete/<?php echo $movie->id; ?>" class="btn btn-danger">Delete</a></td>
                                <td><strong><?php echo $movie->title ; ?></strong></td>
                                <td><?php echo $movie->description ; ?></td>
                                <td><a href="<?php echo DIR;?>admin/movie/edit/<?php echo $movie->id; ?>" class="btn btn-primary">Edit</a></td>
                            </tr>
                            <?php
                            }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<nav>
    <ul class="pagination">
        <?php for($i=1; $i<=$data['pages']; $i++){ ?>
            <li><a href="<?php echo DIR."admin/movies/".$i;?>"><?php echo $i;?></a></li>
        <?php } ?>
    </ul>
</nav>