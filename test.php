<?php

include "./vendor/autoload.php";

use Services\ServiceInitialization;
use Illuminate\Database\Capsule\Manager as Capsule;

ServiceInitialization::loadConfig();
ServiceInitialization::loadDatabaseConfiguration();

$client = new GearmanClient();
$client->addServer();
$client->doBackground("ExampleWorkerJob", json_encode(["sample" => "data"]));
