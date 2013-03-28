<?php
/**
 * ZF2 Phinx Module
 *
 * @link      https://github.com/valorin/zf2-phinx-module
 * @copyright Copyright (c) 2012-2013 Stephen Rees-Carter <http://stephen.rees-carter.net/>
 * @license   See LICENCE.txt - New BSD License
 */

namespace PhinxModule\Controller;

use PhinxModule\Manager\PhinxManager;
use Zend\Console\Request as ConsoleRequest;
use Zend\Mvc\Controller\AbstractActionController;

class ConsoleController extends AbstractActionController
{
    /**
     * @var PhinxManager
     */
    protected $manager;

    /**
     * Sync database credentials with phinx.yml config
     *
     * @return String
     * @throws RuntimeException
     */
    public function setupAction()
    {
        /**
         * Enforce valid console request
         */
        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        /**
         * Run the Phinx setup
         */
        return $this->getPhinxManager()->setup($request->getParam('overwrite', false));
    }

    /**
     * Sync database credentials with phinx.yml config
     *
     * @return String
     * @throws RuntimeException
     */
    public function syncAction()
    {
        /**
         * Enforce valid console request
         */
        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        /**
         * Run the Phinx sync
         */
        return $this->getPhinxManager()->sync($request->getParam('migrations_dir'));
    }

    /**
     * Display phinx init disabled message
     *
     * @return String
     * @throws RuntimeException
     */
    public function initAction()
    {
        /**
         * Enforce valid console request
         */
        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        return "'phinx init' disabled, please run 'phinx sync' to use ZF2 DB credentials.\n";
    }

    /**
     * Display phinx help text
     *
     * @return String
     * @throws RuntimeException
     */
    public function commandAction()
    {
        /**
         * Enforce valid console request
         */
        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can only use this action from a console!');
        }

        /**
         * Run the custom command
         */
        return $this->getPhinxManager()->command();
    }

    /**
     * Returns the PhinxManager class
     *
     * @return PhinxManager
     */
    protected function getPhinxManager()
    {
        if (!$this->manager) {
            $this->manager = new PhinxManager(
                $this->getServiceLocator()->get('console'),
                $this->getServiceLocator()->get('config')
            );
        }

        return $this->manager;
    }
}
