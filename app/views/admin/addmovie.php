<?php
    echo $data['success'];
?>
<form method="post">
    Title:
    <input type="text" name="title"><br>

    SEO:
    <input type="text" name="seo"><br>

    Description:
    <textarea name="description"></textarea><br>

    Actor:
    <select name="actor[]" multiple>
        <?php
        foreach ($data['actors'] as $year) {
            echo '<option value="' . $year->id . '">' . $year->actor . '</option>';
        }
        ?>
    </select><br>

    Genre:
    <select name="genre[]" multiple>
        <?php
        foreach ($data['genres'] as $genre) {
            echo '<option value="' . $genre->id . '">' . $genre->genre . '</option>';
        }
        ?>
    </select><br>

    Rating:
    <select name="rating">
        <?php
        foreach ($data['ratings'] as $rating) {
            echo '<option value="' . $rating->id . '">' . $rating->rating . '</option>';
        }
        ?>
    </select><br>

    Language:
    <select name="language[]" multiple>
        <?php
        foreach ($data['languages'] as $language) {
            echo '<option value="' . $language->id . '">' . $language->lang . '</option>';
        }
        ?>
    </select><br>

    Year:
    <select name="year">
        <?php
        foreach ($data['years'] as $year) {
            echo '<option value="' . $year->id . '">' . $year->yr . '</option>';
        }
        ?>
    </select><br>

    Country of Origin:
    <select name="origin">
        <?php
        foreach ($data['origins'] as $origin) {
            echo '<option value="' . $origin->id . '">' . $origin->country . '</option>';
        }
        ?>
    </select><br>

    <button type="submit" name="submit">Submit</button>
</form>
