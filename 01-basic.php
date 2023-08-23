<!DOCTYPE html>
<html>
<head>
	<title>Folder and File Display</title>
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
			height: 150px;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
		.card:hover {
			background-color: #f5f5f5;
			cursor: pointer;
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
					echo '<div class="card">' . basename($file) . '</div>';
				}
				echo '</div>';
			}
		?>
	</div>
</body>
</html>
