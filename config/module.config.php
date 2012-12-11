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
                'phinx-sync' => array(
                    'options' => array(
                        'route'    => 'phinx sync [--migrations=]',
                        'defaults' => array(
                            'controller' => 'PhinxModule\Controller\Console',
                            'action'     => 'sync'
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
