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
                        echo "In file <strong>$fileName</strong><br>";
                        $comments = file($dir . "/" . $fileName);
                        echo "From: " . htmlentities($comments[0]) . "<br>\n";
                        echo "Email address: " . htmlentities($comments[1]) . "<br>\n";
                        echo "Date: " . htmlentities($comments[2]) . "<br>\n";
                        $commentLines = count($comments);
                        for ($i = 3; $i < $commentLines; $i++) {
                            echo htmlentities($comments[$i]) . "<br>\n";
                        }
                        echo "<hr>";
                    }
                }
            } else {
                echo "Folder \"$dir\" does not exist.<br>\n";
            }
        ?>
	</body>
</html>