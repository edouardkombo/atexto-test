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
 * Rest Interface
 *
 * @category Interfaces
 * @package  Card
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 */
interface RestInterface
{
    /**
     * Get method
     */
    public function get();

    /**
     * Post method
     */
    public function post();
}