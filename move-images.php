<?php

$imagesDir = __DIR__ . '/public/images';
$templateDir = __DIR__ . '/public/template/images';

function moveImages($source, $destination)
{
    if (rename($source, $destination)) {
        echo "Directory moved successfully.\n";
    } else {
        echo "Failed to move directory.\n";
        echo "Error: " . error_get_last()['message'] . "\n";
    }
}

moveImages($imagesDir, $templateDir);
