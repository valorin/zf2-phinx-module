<?php

namespace PhinxModule;

use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Console\ColorInterface as Colour;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ConsoleUsageProviderInterface
{
    /**
     * @var string
     */
    const VERSION = '0.0.1';


    public function getAutoloaderConfig()
    {
        return array(
            //'Zend\Loader\ClassMapAutoloader' => array(
            //    __DIR__ . '/autoload_classmap.php',
            //),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getConsoleBanner(Console $console){

        $status = $console->colorize("=> ", Colour::GREEN)
                 .$console->colorize("Phinx module ", Colour::CYAN)
                 .$console->colorize("v".self::VERSION, Colour::MAGENTA);

        return $status;
    }

    /**
     * Define Console Help text
     *
     * @return Array
     */
    public function getConsoleUsage(Console $console)
    {
        return array(
            $console->colorize('Phinx module commands', Colour::CYAN),
            $console->colorize('phinx sync', Colour::GREEN)
                => "Sync application database credentials with Phinx.",
            $console->colorize('phinx help', Colour::GREEN)
                => "List the Phinx console usage information.",
            $console->colorize('phinx <commands>', Colour::GREEN)
                => "Run the specified Phinx command (run 'phinx help' for the commands list).",
        );
    }
}
