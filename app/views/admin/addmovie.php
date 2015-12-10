<?php
echo $data['success'];
?>
<form method="post">
    <div class="form-group">
        <label>Title</label>
        <input required class="form-control" type="text" name="title">
    </div>

    <div class="form-group">
        <label>SEO</label>
        <input required class="form-control" type="text" name="seo">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="7"></textarea>
    </div>

    <div class="form-group">
        <label>Actor</label>
        <select required class="form-control" name="actor[]" multiple>
            <?php
            foreach ($data['actors'] as $year) {
                echo '<option value="' . $year->id . '">' . $year->actor . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Genre</label>
        <select required class="form-control" name="genre[]" multiple>
            <?php
            foreach ($data['genres'] as $genre) {
                echo '<option value="' . $genre->id . '">' . $genre->genre . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Rating</label>
        <select required class="form-control" name="rating">
            <?php
            foreach ($data['ratings'] as $rating) {
                echo '<option value="' . $rating->id . '">' . $rating->rating . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Language</label>
        <select required class="form-control" name="language[]" multiple>
            <?php
            foreach ($data['languages'] as $language) {
                echo '<option value="' . $language->id . '">' . $language->lang . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Year</label>
        <select required class="form-control" name="year">
            <?php
            foreach ($data['years'] as $year) {
                echo '<option value="' . $year->id . '">' . $year->yr . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Country of Origin</label>
        <select required class="form-control" name="origin">
            <?php
            foreach ($data['origins'] as $origin) {
                echo '<option value="' . $origin->id . '">' . $origin->country . '</option>';
            }
            ?>
        </select>
    </div>

    <button class="form-control btn btn-success" type="submit" name="submit">Submit</button>
</form>
