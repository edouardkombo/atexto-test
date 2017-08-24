<?php
/**
 * Main docblock
 *
 * PHP version 7
 *
 * @category  Abstracts
 * @package   Card
 * @author    Edouard Kombo <edouard.kombo@gmail.com>, tech@headoo.com
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @since     0.0.0
 */
namespace src\Abstracts;

use src\Interfaces\RestInterface;
use src\Interfaces\HandInterface;
use \Exception;

/**
 * Rest Abstract
 *
 * @category Abstracts
 * @package  Card
 * @author   Edouard Kombo <edouard.kombo@gmail.com>, tech@headoo.com
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 */
abstract class RestAbstract implements RestInterface, HandInterface
{

    /**
     *
     * @var string argument called
     */
    public $calledArgument;

    /**
     * Must be implemented by concrete controller
     */
    abstract public function get();

    /**
     * Must be implemented by concrete controller
     */
    abstract public function post();

    /**
     *  Must be implemented by concrete controller
     *  Sort data to match what we want
     */
    abstract public function sort();

    /**
     * Call an argument of the request
     *
     * @param string $arg Argument to call
     */
    public function call($arg)
    {
        $this->calledArgument = $arg;
        return $this;
    }
}