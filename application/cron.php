<?php

// Local base URL
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    $base_url = 'http://localhost/s4stribune.com/';
}
else {
    $base_url = 'http://gooseweb.io/s4stribune.com/';
}

chdir(__DIR__);
$auth = json_decode(file_get_contents('../auth.php'));

$route = 'cron/';
$cron_url = $base_url . $route . $auth->token;
echo $cron_url . '<br>';

echo file_get_contents($cron_url);