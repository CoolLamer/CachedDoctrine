<?php
define('APP_TEMPLATES_DIR', APP_DIR . '/AppModule/templates');
define('TEMP_DIR', __DIR__ . '/../temp');
define('LOG_DIR', __DIR__ . '/../log');

require __DIR__ . '/../libs/autoload.php';

$applicationDirs = array(
	'log' => LOG_DIR,
	'temp' => TEMP_DIR,
	'sessions' => TEMP_DIR . '/sessions',
	'proxies' => TEMP_DIR . '/proxies'
);

foreach ($applicationDirs as $dir) {
	if (!is_dir($dir)) {
		if (!mkdir($dir, 0775, TRUE)) {
			throw new \Exception('Can not create directory: ' . $dir);
		}
	}
}

$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');

// Specify folder for cache
$configurator->setTempDirectory(__DIR__ . '/../temp');

// Enable RobotLoader - this will load all classes automatically
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');
//$configurator->addConfig(__DIR__ . '/config/config.local.neon', $configurator::NONE); // none section

Nella\Console\Config\Extension::register($configurator);
Nella\Doctrine\Config\Extension::register($configurator);

$container = $configurator->createContainer();

return $container;