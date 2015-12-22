
<h1><?php echo $data['title'] ?></h1>
<form method="post">
    <div class="form-group">
        <label>Title</label>
        <input required class="form-control" type="text" name="title" value="<?php echo $data['movietitle']; ?>">
    </div>

    <div class="form-group">
        <label>SEO</label>
        <input required class="form-control" type="text" name="seo" value="<?php echo $data['seo']; ?>">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="7"><?php echo $data['moviedescription']; ?></textarea>
    </div>

    <div class="form-group">
        <label>Actor</label>
        <select required class="form-control" name="actor[]" multiple>
            <?php
            $actors = explode(',',$data['actorsseo']);
            foreach ($data['actors'] as $actor) {
                echo '<option value="' . $actor->id . '" '.(in_array($actor->actorseo,$actors) ? "selected":"").'>' . $actor->actor . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Genre</label>
        <select required class="form-control" name="genre[]" multiple>
            <?php
            $genres = explode(',',$data['genresseo']);
            foreach ($data['genres'] as $genre) {
                echo '<option value="' . $genre->id . '" '.(in_array($genre->seogenre,$genres) ? "selected":"").'>' . $genre->genre . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Rating</label>
        <select required class="form-control" name="rating">
            <?php
            foreach ($data['ratings'] as $rating) {
                echo '<option value="' . $rating->id . '" '.($rating->seorating==$data['ratingsseo'] ? "selected":"").'>' . $rating->rating . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Language</label>
        <select required class="form-control" name="language[]" multiple>
            <?php
            $languages = explode(',',$data['langsseo']);
            foreach ($data['languages'] as $language) {
                echo '<option value="' . $language->id . '"  '.(in_array($language->languageseo,$languages) ? "selected":"").'>' . $language->lang . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Year</label>
        <select required class="form-control" name="year">
            <?php
            foreach ($data['years'] as $year) {
                echo '<option value="' . $year->id . '" '.($year->yr==$data['yr'] ? "selected":"").'>' . $year->yr . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Country of Origin</label>
        <select required class="form-control" name="origin">
            <?php
            foreach ($data['origins'] as $origin) {
                echo '<option value="' . $origin->id . '" '.($origin->countryseo==$data['originsseo'] ? "selected":"").'>' . $origin->country . '</option>';
            }
            ?>
        </select>
    </div>

    <button class="form-control btn btn-success" type="submit" name="submit">Save</button>
</form>
