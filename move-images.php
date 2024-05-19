<?php

$imagesDir = __DIR__ . '/public/images';
$templateDir = __DIR__ . '/public/template/images';

function copyDirectory($source, $destination)
{
    $dir = opendir($source);
    @mkdir($destination);
    while (($file = readdir($dir)) !== false) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($source . '/' . $file)) {
                copyDirectory($source . '/' . $file, $destination . '/' . $file);
            } else {
                copy($source . '/' . $file, $destination . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function moveImages($source, $destination)
{
    copyDirectory($source, $destination);
    echo "Directory copied successfully.\n";
}

moveImages($imagesDir, $templateDir);
