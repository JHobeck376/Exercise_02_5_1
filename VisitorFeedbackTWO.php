<!doctype html>

<html>
	<head>
		<title>Visitor Feedback</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
       <h2>Visitor Feedback</h2>
        <?php
            $dir = "./comments";
            if (is_dir($dir)) {
                $commentFiles = scandir($dir);
                foreach ($commentFiles as $fileName) {
                    if ($fileName !== "." && $fileName !== "..") {
                        echo "From <strong>$fileName</strong><br>";
                        echo "<pre>\n";
                        readfile($dir . "/" . $fileName);
                        echo $comments;
                        echo "</pre>\n";
                        echo "<hr>\n";
                    }
                }
            } else {
                echo "Folder \"$dir\" does not exist.<br>\n";
            }
        ?>
	</body>
</html>