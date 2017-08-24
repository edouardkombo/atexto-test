<?php
/**
 * Main docblock
 *
 * PHP version 7
 *
 * @category  Interfaces
 * @package   Card
 * @author    Edouard Kombo <edouard.kombo@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @since     0.0.0
 */
namespace src\Interfaces;

/**
 * Hand Interface
 *
 * @category Interfaces
 * @package  Card
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 */
interface HandInterface
{
    /**
     * Call an argument of the request
     *
     * @param string $arg Argument to call
     */
    public function call($arg);

    /**
     * Sort method
     */
    public function sort();
}