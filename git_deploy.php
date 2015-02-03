<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 02/02/2015
 * Time: 22:30
 */
$filePath = "app/storage/logs/github.log";

try {
    $payload = json_decode($_REQUEST['payload']);

    //log the request
    file_put_contents($filePath, print_r($payload, TRUE));
if ($payload->ref === 'refs/heads/master') {
//     path to your site deployment script
	echo shell_exec("git pull");
	echo shell_exec("php artisan migrate --force");


    //file_put_contents($filePath, exec('deploy.sh'));
}

} catch (Exception $e) {
    file_put_contents($filePath, $e->getMessage());
    exit(0);
}



