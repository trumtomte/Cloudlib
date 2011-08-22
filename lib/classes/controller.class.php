<?php
/**
 * Cloudlib :: Minor PHP (M)VC Framework
 *
 * @author      Sebastian Book <sebbebook@gmail.com>
 * @copyright   Copyright (c) 2011 Sebastian Book <sebbebook@gmail.com>
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @package     cloudlib
 */

/**
 * The controller class.
 *
 * Abstract class for all the controllers
 *
 * @package     cloudlib
 * @subpackage  cloudlib.lib.classes
 * @copyright   Copyright (c) 2011 Sebastian Book <sebbebook@gmail.com>
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
abstract class controller
{
    /**
     * View object
     *
     * @access  public
     * @var     object
     */
    public $view;

    /**
     * Constructor
     *
     * @access  public
     * @return  void
     */
    public function __construct()
    {
        $this->view = view::factory();
    }

    /**
     * Magic method,
     * gets a module, initiates a new one if it doesnt exist
     *
     * @access  public
     * @param   string  $class
     * @return  object
     */
    public function __get($module)
    {
        return core::loadModule($module);
    }

    /**
     * Abstract method for controllers
     */
    abstract public function index();
}
