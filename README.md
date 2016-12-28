# php-services
(Under Development)

For deployment of background services with PHP. This package enables you to run distributed background process with PHP. Distributed task processing is achieved using Gearman and [Gearman-Manager](https://github.com/brianlmoon/GearmanManager) and scheduling is manged by [Lavary/Crunzy](https://github.com/lavary/crunz) package. Minimalistic approach for using services with MySQL and MongoDB.
(Largely Inspired by Laravel)

## Uses

- [Lavary/Crunzy](https://github.com/lavary/crunz)
- [Gearman-Manager](https://github.com/brianlmoon/GearmanManager)
- [Illuminate/Database](https://github.com/illuminate/database)
 - [Jenssegers/Mongodb (Moloquent)](https://github.com/jenssegers/mongodb)
- [Illuminate/Config](https://github.com/illuminate/config)
 - [Vlucas/PHPDotEnv](https://github/vlucas/phpdotenv)
 - [Symfony/Finder](https://github.com/symfony/finder)

### Installation Notes

Install composer for dependency resolution. For detailed documentation on installing composer visit [getcomposer.org](https://getcomposer.org/download/)

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php --install-dir=bin --filename=composer

Ensure you have composer in path by typing ```composer``` in CLI and getting output.

Clone this repository in a directory and install dependencies.

    git clone https://github.com/sarthaksahni/php-services
    cd ./php-services

#### Installing dependencies:

For production usage do not install dev dependencies

    composer install --no-dev

For Development deployment simple ```composer install``` will install all development dependency.

#### Adding Gearman Config and .env

Copy [gearman.ini.sample](./gearman.ini.sample) to ```gearman.ini```. Look for [configuration of Gearman-Manager](https://github.com/brianlmoon/GearmanManager/blob/master/README.md) for more details.

Copy [.env.sample](.env.sample) to ```.env``` and modify it as per need.

###### TODO:
- Add documentation for workers
- Add documentation for scheduled tasks
- Add documentation for supervisor documentation and deployment

Reach my email: [sarthaksahni@gmail.com](mailto:sarthaksahni@gmail.com) for any help regarding this.
