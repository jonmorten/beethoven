# Beethoven

A task board for ActiveCollab.

## Installation

Clone the repo onto your LAMP (PHP) web server, for example to _/var/www_, so that its path becomes _/var/www/beethoven_.

Follow Symfony2's [server configuration guide](http://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html) or roll your own.

Install [Composer](http://getcomposer.org) in _/var/www/beethoven_ and run `[sudo] php composer.phar install`.

If you get errors regarding 'icu', install the required libraries with `[sudo] apt-get install php5-intl`.

Make sure the values in _/var/www/beethoven/app/config/parameters.yml_ are correct.
