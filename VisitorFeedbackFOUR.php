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
                        $fileHandle = fopen($dir . "/" . $fileName, "rb");
                        if ($fileHandle === false) {
                            echo "There was an error reading file \"$fileName\".<br>\n";
                        } else {
                            $from = fgets($fileHandle);
                            echo "From: " . htmlentities($from) . "<br>\n";
                            $email = fgets($fileHandle);
                            echo "Email address: " . htmlentities($email) . "<br>\n";
                            $date = fgets($fileHandle);
                            echo "Date: " . htmlentities($date) . "<br>\n";
                            $comment = "";
                            while (!feof($fileHandle)) {
                                $comment = fgets($fileHandle);
                                echo htmlentities($comment) . "<br>\n";
                            }
                            echo "<hr>";
                            fclose($fileHandle);
                        }
                    }
                }
            } else {
                echo "Folder \"$dir\" does not exist.<br>\n";
            }
        ?>
	</body>
</html>