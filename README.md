ZF2 Phinx Module
================
*Created by [Stephen Rees-Carter](http://stephen.rees-carter.net/), version 0.0.2.

[ZF2](http://framework.zend.com/) module to integrate the [Phinx database migration tool](https://github.com/robmorgan/phinx) into a ZF2 application console. It provides a way to sync the application DB connections with Phinx, and run each of the Phinx commands easily.

Installation
------------

The easiest way to install the module is using Composer (<http://getcomposer.org/>).

1. Install composer:

    ```
    curl -s https://getcomposer.org/installer | php
    ```

2. Add Phinx as a dependency to your `composer.json` file:

    ```
    ./composer.phar require "valorin/zf2-phinx-module":"0.*"
    ```

3. Update `./config/application.config.php` and add enable the `PhinxModule`:

    ```php
    <?php
    return array(
        'modules' => array(
            'Application',
            // ...
            'PhinxModule',
        ),
    );
    ```

4. Run the application console to see usage information:

    ```
    valorin@gandalf ~/workspace/project $ php ./public/index.php
    ========================
    = Your ZF2 Application =
    ========================
    => Phinx v0.1.6
    => Phinx module v0.0.1

    Phinx module commands
      index.php phinx sync [--migrations=]    Sync application database credentials with Phinx.
      index.php phinx                         List the Phinx console usage information.
      index.php phinx <phinx commands>        Run the specified Phinx command (run 'phinx' for the commands list).

      --migrations    Location to store migration classes in (default ./data/migrations).
    ```

