<?php
namespace Worker;

use Services\ServiceInitialization;
use Illuminate\Database\Capsule\Manager as Capsule;

class ExampleWorkerJob
{
    public function beforeRun()
    {
        ServiceInitialization::loadConfig();
        ServiceInitialization::loadDatabaseConfiguration();
    }

    public function run($job, &$log)
    {
        $workload = $job->workload();
        ServiceInitialization::$config->all();

        print_r($workload);
        print_r(["**************************************","&&&&"]);
        // do work on $job here as documented in pecl/gearman docs

        // Log is an array that is passed in by reference that can be
        // added to for logging data that is not part of the return data
        $log[] = "Success";

        // return your result for the client
        return $result;
    }
}
