# Beethoven

A task board for ActiveCollab.

## Installation

Clone the repo onto your LAMP (PHP) web server, for example to _/var/www_, so that its path becomes _/var/www/beethoven_.

Take a look at Laravel's [installation guide](http://laravel.com/docs/installation).

Install [Composer](http://getcomposer.org) in _/var/www/beethoven_ and run `[sudo] php composer.phar install`.

Create the file _.env.php_ inside _/var/www/beethoven_, using the following as a template:

```php
<?php
return array(
	'activecollab' => array(
		'api_token' => 'TOKEN',
	),
	'database' = array(
		'connections' => array(
			'activecollab' => array(
				'driver' => 'DRIVER',
				'host' => 'HOST',
				'database' => 'DATABASE',
				'username' => 'USERNAME',
				'password' => 'PASSWORD',
				'charset' => 'CHARSET',
				'collation' => 'COLLATION',
				'prefix' => 'PREFIX',
			),
			'beethoven' => array(
				'driver'=> 'DRIVER',
				'host' => 'HOST',
				'database' => 'DATABASE',
				'username' => 'USERNAME',
				'password' => 'PASSWORD',
				'charset' => 'CHARSET',
				'collation' => 'COLLATION',
				'prefix' => 'PREFIX',
			),
		),
	),
);
```
