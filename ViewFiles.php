<!doctype html>

<html>
	<head>
		<title>View Files</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
        <h2>View Files</h2>
        <?php
            $dir = "../Exercise_02_01_1";
            $openDir = opendir($dir);
            while($curFile = readdir($openDir)){
                if (strcmp($entry, '.') !== 0 && strcmp($curfile, '..') !== 0) {
                    echo "";
                }
            }
        ?>
	</body>
</html>