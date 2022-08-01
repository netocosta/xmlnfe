<?php
$dir = 'xml/';
$files = scandir($dir);

foreach ($files as $file) {
    if (!in_array($file, [".", ".."])) {
        echo "<a href='ver.php?arquivo={$file}'>{$file}<br />";
    }
}

echo "<br>";

echo "<a href='index.php'>Ir para envio de arquivos.</a><br />";