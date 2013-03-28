ZF2 Phinx Module
================
*Created by [Stephen Rees-Carter][src], version 0.1.1.* [![Build Status][travis-img]][travis-url]

[ZF2][zf] module to integrate the [Phinx database migration tool][phinx] into a ZF2 application console.
It provides a way to sync the application DB connections with Phinx, and run each of the Phinx commands easily.

Installation
------------

The easiest way to install the module is using [Composer][composer].

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
    => Phinx v0.2.0
    => Phinx module v0.1.1

    Phinx module commands
      index.php phinx setup [--overwrite]    Interactive Phinx setup wizard - will create both config files for you.
      index.php phinx sync                   Sync application database credentials with Phinx.
      index.php phinx                        List the Phinx console usage information.
      index.php phinx <phinx commands>       Run the specified Phinx command (run 'phinx' for the commands list).

      --overwrite         Will force the setup tool to run and overwrite any existing configuration.
      <phinx commands>    Any support Phinx commands - will be passed through to Phinx as-is.
    ```

Commands
--------

`index.php phinx setup [--overwrite]` - Interactive setup script that asks the user for the database credentials and
generates the ZF2 config file (`./config/autoload/phinx.local.php`) and the Phinx config file (`./config/phinx.yml`).

`index.php phinx sync` - Saves the database credentials found in the ZF2 config into the Phinx config file
(`./config/phinx.yml`) so you don't need to keep them both up-to-date.

`index.php phinx <phinx commands>` - Calls the Phinx cli and passes any specified *phinx commands* through to Phinx.
It also automatically configures the custom phinx.yml location so you don't need to worry about it.
Running this without any commands will return the Phinx command reference.

Composer Integration
--------------------

The Phinx Module comes with support for [Composer Scripts][com-scripts] so you can have your application
database automatically set up and migrated as part of the composer install. Simply add the following block
to your `composer.json`, and it will automatically setup and migrate after a successful `composer install`
or `composer update`.

```
"scripts": {
    "post-install-cmd": [
        "PhinxModule\\Composer\\ScriptHandler::setup",
        "PhinxModule\\Composer\\ScriptHandler::migrate"
    ],
    "post-update-cmd": [
        "PhinxModule\\Composer\\ScriptHandler::setup",
        "PhinxModule\\Composer\\ScriptHandler::migrate"
    ]
}
```

*All commands are optional, so only use what you need.*

Version History
---------------

**`v0.1.1` - 2013-03-28**
- Code refactoring and cleanup of setup and sync commands.
- Removed reliance on /vendor/bin dir.

**`v0.1.0` - 2013-03-03**
- Added Interactive setup command.
- Added support for Composer Scripts.


[src]:http://stephen.rees-carter.net/
[travis-img]:https://travis-ci.org/valorin/zf2-phinx-module.png?branch=master
[travis-url]:https://travis-ci.org/valorin/zf2-phinx-module
[zf]:http://framework.zend.com/
[phinx]:https://github.com/robmorgan/phinx
[composer]:http://getcomposer.org/
[com-scripts]:http://getcomposer.org/doc/articles/scripts.md
