<?php
// Function to get all files in a directory recursively
function get_files($dir) {
    $files = scandir($dir);
    $files = array_diff($files, array('.', '..'));

    $result = array();
    foreach($files as $file) {
        $path = $dir.'/'.$file;
        if(is_dir($path)) {
            $result = array_merge($result, get_files($path));
        } else {
            $result[] = $path;
        }
    }
    return $result;
}

// Directory path
$dir = ".";

// Get all files recursively
$files = get_files($dir);

// Group files by folder
$folders = array();
foreach($files as $file) {
    $folder = dirname($file);
    $folders[$folder][] = $file;
}

// Category name
$category = "OTT Category Name";

// Output HTML
echo '<div class="ott-category">';
echo '<h2>'.$category.'</h2>';

// Loop through folders and display them
foreach($folders as $folder => $files) {
    // Get folder name for secondary header
    $folder_name = basename($folder);

    echo '<div class="folder">';
    echo '<h3>'.$folder_name.'</h3>';

    // Loop through files in folder and display them as video cards
    echo '<div class="video-card-scroll">';
    foreach($files as $file) {
        $thumbnail_path = dirname($file).'/thumbnails/'.basename($file, '.'.pathinfo($file, PATHINFO_EXTENSION)).'.jpg'; // Assuming thumbnail images are in a separate "thumbnails" directory
        echo '<div class="video-card">';
        echo '<div class="thumbnail"><img src="'.$thumbnail_path.'"></div>';
        echo '<div class="title">'.basename($file).'</div>';
        echo '</div>';
    }
    echo '</div>';

    echo '</div>';
}

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

    .folder {
        margin-bottom: 20px;
    }

    .folder h3 {
        font-size: 20px;
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
