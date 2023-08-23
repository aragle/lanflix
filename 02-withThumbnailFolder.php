<!DOCTYPE html>
<html>
<head>
	<title>Folder and File Display with Thumbnails</title>
	<style>
		.container {
			display: flex;
			flex-wrap: wrap;
		}
		.header {
			flex-basis: 100%;
			font-size: 24px;
			font-weight: bold;
			margin-top: 20px;
		}
		.card {
			border: 1px solid #ccc;
			border-radius: 5px;
			padding: 10px;
			margin: 10px;
			width: 200px;
			height: 200px;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
		.card:hover {
			background-color: #f5f5f5;
			cursor: pointer;
		}
		.thumbnail {
			max-width: 100%;
			max-height: 100%;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
			$dir = '.';
			$folders = array_filter(glob($dir . '/*'), 'is_dir');
			foreach ($folders as $folder) {
				echo '<div class="header">' . basename($folder) . '</div>';
				echo '<div class="container">';
				$files = glob($folder . '/*.*');
				foreach ($files as $file) {
					$file_ext = pathinfo($file, PATHINFO_EXTENSION);
					echo '<div class="card">';
					if (in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
						echo '<img class="thumbnail" src="' . $file . '">';
					} elseif (in_array($file_ext, array('mp4', 'webm', 'ogg'))) {
						echo '<video class="thumbnail" src="' . $file . '" controls></video>';
					} elseif (in_array($file_ext, array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'))) {
						echo '<img class="thumbnail" src="thumbnails/' . $file_ext . '.png">';
					} else {
						echo '<img class="thumbnail" src="thumbnails/default.png">';
					}
					echo '<div>' . basename($file) . '</div>';
					echo '</div>';
				}
				echo '</div>';
			}
		?>
	</div>
</body>
</html>
