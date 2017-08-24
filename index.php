<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "vendor/autoload.php";
require "./src/Interfaces/RestInterface.php";
require "./src/Interfaces/HandInterface.php";
require "./src/Abstracts/RestAbstract.php";
require "./src/Controller/ApiController.php";


$api = new \src\Controller\apiController('https://recrutement.local-trust.com/test/', 'cards/586f4e7f975adeb8520a4b88');

$api->get();
$api->call('exerciceId')->get();
$api->sort();
$response = $api->post();

echo "<pre>";
var_dump($response->code);
var_dump($response->request->payload);
echo "</pre>";