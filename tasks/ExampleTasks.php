<?php
use Crunz\Schedule;

date_default_timezone_set("Asia/Kolkata");
$schedule = new Schedule();

$sample = "Some Info";
$schedule->run(function () use ($sample) {
    $client = new GearmanClient();
    $client->addServer();
    $client->doBackground("ExampleWorkerJob", json_encode(["sample" => "data"]));
})
->everyMinute()
->preventOverlapping();

return $schedule;
