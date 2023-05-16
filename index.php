<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LANFLIX</title>
</head>
<body>

<?php
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
$category = "LANFLIX";

// Default thumbnail URL
$default_thumbnail_url = "https://www.pngkit.com/png/full/267-2678423_bacteria-video-thumbnail-default.png";

// Output HTML
echo '<div class="ott-category">';
// echo '<h2>'.$category.'</h2>';

// Loop through folders and display them
foreach($folders as $folder => $files) {

    if($folder == '.') {
        continue;
    }

    // Get folder name for secondary header
    $folder_name = basename($folder);

    echo '<div class="folder">';
    echo '<h3>'.$folder_name.'</h3>';

    // Loop through files in folder and display them as video cards
    echo '<div class="video-card-scroll">';
    foreach($files as $file) {
        $thumbnail_path = dirname($file).'/thumbnails/'.basename($file, '.'.pathinfo($file, PATHINFO_EXTENSION)).'.jpg'; // Assuming thumbnail images are in a separate "thumbnails" directory
        $thumbnail_url = file_exists($thumbnail_path) ? $thumbnail_path : $default_thumbnail_url;
        echo '<div class="video-card">';
        echo '<a href="'.$file.'" download="'.basename($file).'">';
        echo '<div class="thumbnail"><img src="'.$thumbnail_url.'"></div>';
        echo '<div class="title">'.basename($file).'</div>';
        echo '</a>';
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

	.video-card a {
		text-decoration: none;
		color: #555;
		font-family: 'Rajdhani', sans-serif;
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
		font-family: 'Rajdhani', sans-serif;
    }

	@media only screen and (max-width: 768px) {
  .video-card-scroll {
    flex-wrap: wrap;
    justify-content: center;
  }

  .video-card {
    width: 50%;
    margin: 10px 0;
    align-items: left;
  }

  .thumbnail {
    height: 75px;
  }

  .title {
    font-size: 14px;
  }
}

@media only screen and (max-width: 480px) {

  .video-card-scroll {
    flex-wrap: wrap;
    justify-content: center;
  }

  .video-card {
    width: 50%;
    margin: 10px 5px;
  }

  .thumbnail {
    width: 50%;
    height: 75px;
    margin: 10px 5px;
  }
  .title {
  font-size: 16px;
  font-weight: bold;
  margin-top: 5px;
  font-family: 'Rajdhani', sans-serif;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
}

</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300&display=swap" rel="stylesheet">
</body>
</html>
