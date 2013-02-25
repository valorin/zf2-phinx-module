<?php
/**
 * ZF2 Phinx Module
 *
 * @link      https://github.com/valorin/zf2-phinx-module
 * @copyright Copyright (c) 2012-2013 Stephen Rees-Carter <http://stephen.rees-carter.net/>
 * @license   See LICENCE.txt - New BSD License
 */
return array(
    'controllers' => array(
        'invokables' => array(
            'PhinxModule\Controller\Console' => 'PhinxModule\Controller\ConsoleController',
        ),
    ),
    'console' => Array(
        'router' => array(
            'routes' => array(
                'phinx-command' => array(
                    'options' => array(
                        'route'    => 'phinx [<c1>] [<c2>] [<c3>] [<c4>] [<c5>] [--help|-h] [--quiet|-q] [--verbose|-v] [--version|-V] [--ansi] [--no-ansi] [--no-interaction|-n] [--configuration|-c] [--xml] [--raw] [--environment|-e] [--target|-t]',
                        'defaults' => array(
                            'controller' => 'PhinxModule\Controller\Console',
                            'action'     => 'command'
                        ),
                    ),
                ),
                'phinx-sync' => array(
                    'options' => array(
                        'route'    => 'phinx sync [--migrations_dir=]',
                        'defaults' => array(
                            'controller' => 'PhinxModule\Controller\Console',
                            'action'     => 'sync'
                        ),
                    ),
                ),
                'phinx_setup' => array(
                    'options' => array(
                        'route'    => 'phinx setup [--overwrite]',
                        'defaults' => array(
                            'controller' => 'PhinxModule\Controller\Console',
                            'action'     => 'setup',
                        ),
                    ),
                ),
                'phinx-init' => array(
                    'options' => array(
                        'route'    => 'phinx init',
                        'defaults' => array(
                            'controller' => 'PhinxModule\Controller\Console',
                            'action'     => 'init'
                        ),
                    ),
                ),
            ),
        ),
    ),
    'phinx-module' => Array(
        'zf2-config'   => getcwd().'/config/autoload/phinx.local.php',
        'phinx-config' => getcwd().'/config/phinx.yml',
        'migrations'   => getcwd().'/data/migrations',
    ),
);
