<?php
// Directory path
$dir = ".";

// Read all files from the directory
$files = scandir($dir);

// Remove '.' and '..' from the list
$files = array_diff($files, array('.', '..'));

// Category name
$category = "OTT Category Name";

// Output HTML
echo '<div class="ott-category">';
echo '<h2>'.$category.'</h2>';

// Loop through files and display them as video cards
echo '<div class="video-card-scroll">';
foreach($files as $file) {
    echo '<div class="video-card">';
    echo '<div class="thumbnail"><img src="'.$dir.'/'.$file.'"></div>';
    echo '<div class="title">'.$file.'</div>';
    echo '</div>';
}
echo '</div>';

echo '</div>';
?>

<!-- CSS styles -->
<style>
    .ott-category {
        padding: 20px;
        background-color: #f8f8f8;
    }

    .ott-category h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .video-card-scroll {
        display: flex;
        overflow-x: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .video-card-scroll::-webkit-scrollbar {
        display: none;
    }

    .video-card {
        width: 200px;
        margin-right: 10px;
    }

    .thumbnail {
        width: 200px;
        height: 100px;
        overflow: hidden;
        border-radius: 10px;
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .title {
        font-size: 16px;
        font-weight: bold;
        margin-top: 5px;
    }
</style>
