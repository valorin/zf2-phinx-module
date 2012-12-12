<?php
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
                        'route'    => 'phinx sync [--migrations=]',
                        'defaults' => array(
                            'controller' => 'PhinxModule\Controller\Console',
                            'action'     => 'sync'
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
        'config'     => getcwd().'/config/phinx.yml',
        'migrations' => getcwd().'/data/migrations',
    ),
);
