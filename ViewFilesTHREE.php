<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>View Files 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>View Files 3</h2>
    <?php
    $dir = "../Exercise_02_01_1";
    // scans the directory and creates it as a table.
    $dirEntries = scandir($dir);
    echo "<table border='1' width='100%'>";
    echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "</strong> </th></tr>\n";
    echo "<tr>";
    echo "<th><strong><em>Name</em></strong></th>";
    echo "<th><strong><em>Owner</em></strong></th>";
    echo "<th><strong><em>Permissions</em></strong></th>";
    echo "<th><strong><em>Size</em></strong></th>";
    echo "</tr>\n";
    /* loop that closes the directory and creates the files to clickable links and create the data that is within the table.*/
    foreach ($dirEntries as $entry) {
        if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
            $fullEntryName = $dir . "/" . $entry;
            echo "<tr><td>";
            if (is_file($fullEntryName)) {
                echo "<a href=\"FileDownloader.php?fileName=$entry\">$fullEntryName</a><br>\n";    
            }
            else {
                echo htmlentities($entry);
            }
            echo "</td><td align='center'>" . fileowner($fullEntryName);
            if (is_file($fullEntryName)) {
               $perms = fileperms($fullEntryName);
               $perms = decoct($perms % 01000);
               echo "</td><td align='center'>0$perms";
               echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . " bytes";
            }
            else {
                echo "</td><td colspan='2' align='center'>&lt;DIR&gt;";
            }
            echo "</td></tr>";     
        }
    } 
    echo "</table>";
    ?>
</body>
</html>