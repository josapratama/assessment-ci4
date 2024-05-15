<?php

$adminlteDir = __DIR__ . '/vendor/almasaeed2010/adminlte';

$publicDir = __DIR__ . '/public/template';

function moveAdminLTE($source, $destination)
{
    if (rename($source, $destination)) {
        echo "Directory moved successfully.\n";
    } else {
        echo "Failed to move directory.\n";
        echo "Error: " . error_get_last()['message'] . "\n";
    }
}

moveAdminLTE($adminlteDir, $publicDir);
