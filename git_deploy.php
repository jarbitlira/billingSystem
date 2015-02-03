<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 02/02/2015
 * Time: 22:30
 */

try {
    $payload = json_decode($_REQUEST['payload']);
} catch (Exception $e) {
    exit(0);
}

//log the request
$filePath = "app/storage/logs/github.log";
file_put_contents($filePath, print_r($payload, TRUE));


if ($payload->ref === 'refs/heads/master') {
//     path to your site deployment script
    file_put_contents($filePath, exec('deploy.sh'));
}