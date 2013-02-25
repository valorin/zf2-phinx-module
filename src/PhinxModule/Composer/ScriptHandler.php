<?php
/**
 * ZF2 Phinx Module
 *
 * @link      https://github.com/valorin/zf2-phinx-module
 * @copyright Copyright (c) 2012-2013 Stephen Rees-Carter <http://stephen.rees-carter.net/>
 * @license   See LICENCE.txt - New BSD License
 */

namespace PhinxModule\Composer;

use Composer\Script\Event;

class ScriptHandler
{
    /**
     * Sets up Phinx environment
     *
     * @param  Event $event
     */
    public static function setup(Event $event)
    {
        echo "... setup phinx ...\n";
    }


    /**
     * Migrates the db to latest
     *
     * @param  Event $event
     */
    public static function migrate(Event $event)
    {
        echo "... migrate phinx ...\n";
    }
}
