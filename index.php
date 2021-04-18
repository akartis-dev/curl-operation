<?php
/**
 * @author <Akartis>
 * (c) akartis-dev <sitrakaleon23@gmail.com>
 * Do it with love
 */

use AkartisDev\CurlOperation;

require __DIR__ . "/vendor/autoload.php";

$curl = new CurlOperation('https://jsonplaceholder.typicode.com');
$curl->json();
$result = $curl->get('posts/1');
var_dump($result);
