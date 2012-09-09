<?php
/**
 * Cloudlib
 *
 * @author      Sebastian Book <cloudlibframework@gmail.com>
 * @copyright   Copyright (c) 2012 Sebastian Book <cloudlibframework@gmail.com>
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace cloudlib\core;

use RuntimeException;

/**
 * The View class
 *
 * @copyright   Copyright (c) 2012 Sebastian Book <cloudlibframework@gmail.com>
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class View
{
    /**
     * String containing the directory name to be prepended to filenames
     *
     * @access  public
     * @var     string
     */
    public $directory = null;

    /**
     * String containing the file extension to be appended to filenames
     *
     * @access  public
     * @var     string
     */
    public $extension = '.php';

    /**
     * The rendered content
     *
     * @access  public
     * @var     string
     */
    public $content = '';

    /**
     * Define a View file, layout file (optional) and an array of view variables (optional)
     *
     * @access  public
     * @param   string  $file   The view filename
     * @param   string  $layout The layout filename
     * @param   array   $data   Array of view variables
     * @return  void
     */
    public function __construct($file, $layout = null, array $data = array())
    {
        $file = $this->find($file);

        if($layout)
        {
            $layout = $this->find($layout);
        }

        $this->render($file, $layout, $data);
    }

    /**
     * Render and define the content string
     *
     * @access  public
     * @param   string  $file   The view filename
     * @param   string  $layout The layout filename
     * @param   array   $data   Array of view variables
     * @return  void
     */
    public function render($file, $layout = null, array $data = array())
    {
        ob_start();

        extract($data);

        require $file;

        if($layout)
        {
            $body = ob_get_contents();

            ob_clean();

            require $layout;
        }

        $this->content = ob_get_clean();
    }

    /**
     * Find a file based on the filename
     *
     * @access  public
     * @param   string  $filename   The filename to be found
     * @return  string  $file       Returns the found filename
     */
    public function find($filename)
    {
        if( ! file_exists($file = $this->directory . $filename . $this->extension))
        {
            throw new RuntimeException(sprintf('File [%s] does not exist', $file));
        }

        return $file;
    }

    /**
     * Define the directory path to be prepended to filenames
     *
     * @access  public
     * @param   string  $directory  The directory path
     * @return  void
     */
    public function directory($directory)
    {
        $this->directory = $directory;
    }

    /**
     * Define the file extension to be appended to filenames
     *
     * @access  public
     * @param   string  $extension  The file extension
     * @return  void
     */
    public function extension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * When the View object is converted to a string return the rendered content
     *
     * @access  public
     * @return  string  The rendered content
     */
    public function __toString()
    {
        return (string) $this->content;
    }
}
