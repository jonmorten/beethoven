# Beethoven

A task board for ActiveCollab.

## Installation

Clone the repo onto your LAMP (PHP) web server, for example to _/var/www_, so that its path becomes _/var/www/beethoven_.

Follow Symfony2's [server configuration guide](http://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html) or roll your own.

Install [Composer](http://getcomposer.org) in _/var/www/beethoven_ and run `[sudo] php composer.phar install`.

If you get errors regarding 'icu', install the required libraries with `[sudo] apt-get install php5-intl`. If this does not help, it won't.

Change the file _/var/www/beethoven/app/config/parameters.yml_ and base it on the following template. Replace the null-values as appropriate.

	parameters:

		database_driver: pdo_mysql
		database_host: 127.0.0.1
		database_port: null
		database_name: null
		database_user: null
		database_password: null

		mailer_transport: smtp
		mailer_host: 127.0.0.1
		mailer_user: null
		mailer_password: null

		locale: en
		secret: ThisTokenIsNotSoSecretChangeIt

		# activecollab
		activecollab.api_token: null
		activecollab.database_driver: pdo_mysql
		activecollab.database_host: null
		activecollab.database_port: null
		activecollab.database_name: null
		activecollab.database_user: null
		activecollab.database_password: null

		# beethoven
		beethoven.database_driver: pdo_mysql
		beethoven.database_host: 127.0.0.1
		beethoven.database_port: null
		beethoven.database_name: null
		beethoven.database_user: null
		beethoven.database_password: null
