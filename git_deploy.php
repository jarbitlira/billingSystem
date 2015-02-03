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

    $results = "";

    //log the request
    file_put_contents($filePath, print_r($payload, TRUE));
    if ($payload->ref === 'refs/heads/master') {
//     path to your site deployment script
        $results .= shell_exec("git pull");
        $results .= "<br>";
        $results .= shell_exec("composer dump-autoload");
        $results .= "<br>";
        $results .= shell_exec("php artisan dump-autoload");
        $results .= "<br>";
        $results .= shell_exec("php artisan migrate --force");
        $results .= "<br>";
        if (isset($payload->commits)) {
            foreach ($payload->commits as $commit) {
                if (isset($commit->modified)) {
                    foreach ($commit->modified as $file) {
                        if ($file == "composer.json") {
                            $results .= shell_exec("composer update --no-dev --no-scripts");
                            $results .= "<br>";
                        }
                    }
                }
            }
        }
        file_put_contents($filePath, str_replace("<br>", "\n", $results));
    }

} catch (Exception $e) {
    file_put_contents($filePath, $e->getMessage());
    exit(0);
}



