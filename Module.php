<?php
/**
 * ISLE - Intelligent Shopping List gEnerator
 *
 * Copyright (c) 2012, Stephen Rees-Carter - stephen@rees-carter.net
 * http://stephen.rees-carter.net/
 *
 * All rights reserved. Unauthorised distribution is prohibited.
 */

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
    ConsoleBannerProviderInterface,
    ConsoleUsageProviderInterface
{
    /**
     * @var string
     */
    const VERSION = '0.0.1';


    /**
     * Generates the Console Banner text
     *
     * @param  Console $console
     * @return String
     */
    public function getConsoleBanner(Console $console)
    {
        /**
         * Work out Phinx version
         */
        $file    = false;
        $version = "unknown";
        if (file_exists(__DIR__ ."/../../bin/phinx")) {
            $file = file_get_contents(__DIR__ ."/../../bin/phinx");
        } elseif (file_exists(__DIR__ ."/../../vendor/bin/phinx")) {
            $file = file_get_contents(__DIR__ ."/../../vendor/bin/phinx");
        }

        if ($file && preg_match("/(\d+\.\d+\.\d+)/", $file, $match)) {
            $version = "v".$match[1];
        }


        /**
         * Output version
         */
        $status = $console->colorize("=> ", Colour::GREEN)
                 .$console->colorize("Phinx ", Colour::CYAN)
                 .$console->colorize($version, Colour::MAGENTA)
                 ."\n"
                 .$console->colorize("=> ", Colour::GREEN)
                 .$console->colorize("Phinx module ", Colour::CYAN)
                 .$console->colorize("v".self::VERSION, Colour::MAGENTA);

        return $status;
    }


    /**
     * Define Console Help text
     *
     * @param  Console $console
     * @return String
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
}
