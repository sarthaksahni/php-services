<?php
namespace Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use Services\Config as Config;

class ServiceInitialization
{

    /**
     * Configuration storage.
     */
     public static $config;

    /**
     * Path to env config file.
     * Defaults to root directory of project
     */
    public static $env_config_file_path;

    /**
     * Path to config files.
     * Defaults to config directory
     */
    public static $config_directory_path;

    /**
     * Initializes DotEnv and loads env file from path.
     */
    public static function loadConfig($config_dir_path = null, $env_path = null)
    {
        self::$config_directory_path = is_null($config_dir_path) ? dirname(__DIR__).DIRECTORY_SEPARATOR."config" : $config_dir_path;
        self::$env_config_file_path = is_null($env_path) ? dirname(__DIR__).DIRECTORY_SEPARATOR : $env_path;

        if(!file_exists(self::$env_config_file_path.".env")) {
            throw new \Exception("Unable to locate .env file", 1);
        }

        $dotenv = new \Dotenv\Dotenv(self::$env_config_file_path);
        $dotenv->load();

        self::$config = new Config();
        self::$config->loadConfigurationFiles(
            self::$config_directory_path,
            self::getEnvironment()
        );
    }

    /**
     * Detect the environment. Defaults to `production`.
     *
     * @return string
     */
     public static function getEnvironment()
     {
        return getenv('ENVIRONMENT') ?: 'production';
     }

    /**
     * Load Illuminate/Database for query using Capsule
     */
     public static function loadDatabaseConfiguration()
     {
         $capsule = new Capsule;

         // Adding Moloquent Compatbility.
         $capsule->getDatabaseManager()->extend('mongodb', function($config)
         {
             return new \Jenssegers\Mongodb\Connection($config);
         });

         // Fetching all Database configurations
         $database_configs = self::getDatabaseConfigurations();

         if(!isset($database_configs[self::$config->get("database.default")])) {
            throw new \Exception("Unable to find default config in config/database.php", 1);
         }

         // Load all connection configurations found database.php
         foreach($database_configs as $config_name => $database_config) {
            if($config_name == self::$config->get("database.default"))
                $capsule->addConnection($database_config, "default");
            else
                $capsule->addConnection($database_config, $config_name);
         }

         // Make this Capsule instance available globally via static methods... (optional)
         $capsule->setAsGlobal();

         // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
         $capsule->bootEloquent();
     }

     /**
      * Get database configurations from config directory.
      */
      public static function getDatabaseConfigurations()
      {
          return self::$config->get("database.connections");
      }
}
