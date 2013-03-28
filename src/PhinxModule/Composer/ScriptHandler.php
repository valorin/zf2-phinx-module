<?php
/**
 * ZF2 Phinx Module
 *
 * @link      https://github.com/valorin/zf2-phinx-module
 * @copyright Copyright (c) 2012-2013 Stephen Rees-Carter <http://stephen.rees-carter.net/>
 * @license   See LICENCE.txt - New BSD License
 *
 */
namespace PhinxModule\Composer;

require_once 'init_autoloader.php';

use Composer\Script\Event;
use PhinxModule\Manager\PhinxManager;
use Zend\Console\Console;
use Zend\Mvc\Application as ZfApp;

class ScriptHandler
{
    /**
     * Sets up Phinx environment
     *
     * @param Event $event
     */
    public static function setup(Event $event)
    {
        $zfApp = ZfApp::init(require 'config/application.config.php');
        $manager = new PhinxManager(
            $zfApp->getServiceManager()->get('console'),
            $zfApp->getServiceManager()->get('config')
        );

        $manager->setup(false);
    }

    /**
     * Migrates the db to latest
     *
     * @param Event $event
     */
    public static function migrate(Event $event)
    {
        $zfApp = ZfApp::init(require 'config/application.config.php');
        $manager = new PhinxManager(
            $zfApp->getServiceManager()->get('console'),
            $zfApp->getServiceManager()->get('config')
        );

        $argv = $_SERVER['argv'];
        $_SERVER['argv'] = Array('cli', 'phinx', 'migrate');
        $manager->command();
        $_SERVER['argv'] = $argv;
    }
}
