<?php
/**
 * Main docblock
 *
 * PHP version 7
 *
 * @category  Src
 * @package   Card
 * @author    Edouard Kombo <edouard.kombo@gmail.com>, tech@headoo.com
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @since     0.0.0
 */
namespace src\Controller;

use \Httpful\Request as Request;
use src\Abstracts\RestAbstract;
use \Exception;

/**
 * ApiController
 *
 * @category Src
 * @package  Card
 * @author   Edouard Kombo <edouard.kombo@gmail.com>, tech@headoo.com
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 */
class ApiController extends RestAbstract
{
    /**
     *
     * @var string
     */
    private $baseURL;

    /**
     *
     * @var string
     */
    private $getURL;

    /**
     *
     * @var string
     */
    private $response;

    /**
     *
     * @var string
     */
    private $sortedData;

    /**
     * Array that stores magic properties to avoid any conflict
     *
     * @var array
     */
    protected $values = array();


    /**
     * Constructor
     *
     * @param string $baseUrl   Base url to call the api
     * @param string $getParam  Get parameter for the apo
     */
    public function __construct($baseUrl, $getParam)
    {
        $this->baseURL = $baseUrl;
        $this->getURL = $baseUrl . $getParam;
    }

    /**
     * Magic get method
     *
     * @return string
     */
    public function __get($key)
    {
        return $this->values[$key];
    }

    /**
     * Magic set method
     *
     * @return null
     */
    public function __set( $key, $value )
    {
        $this->values[ $key ] = $value;
        $this->calledArgument = '';
    }

    /**
     * Call card api and/or retrieve api specific data
     *
     * @return string
     */
    public function get()
    {
        if (empty($this->calledArgument)) {
            return $this->response = Request::get($this->getURL)->send()->body;
        } else {
            return (string) $this->{$this->calledArgument} = $this->response->{$this->calledArgument};
        }
    }

    /**
     * Send data to card api
     *
     * @param string $data Data to send
     *
     * @return HttpStatus
     */
    public function post()
    {
        $url = $this->baseURL . $this->exerciceId;
        return $response = \Httpful\Request::post($url)
            ->sendsJson()
            ->body($this->sortedData)
            ->send();
    }

    /**
     * Send data to card api
     *
     * @param string $data Data to send
     *
     * @return string
     */
    public function sort()
    {
        $i = -1;
        $newArray = array();
        $newArray['cards'] = array();
        $newArray['categoryOrder'] = array();
        $cards = $this->response->data->cards;
        $categoryOrder = $this->response->data->categoryOrder;
        $valueOrder = $this->response->data->valueOrder;

        foreach($categoryOrder as $coKey => $coValue) {
            foreach($valueOrder as $voKey => $voValue) {
                foreach($cards as $cardKey => $cardValue) {
                    if ($coValue === $cardValue->category && $voValue === $cardValue->value) {
                        $i++;
                        $newArray['cards'][$i] = array("category" => $coValue, "value" => $voValue);
                        $newArray['categoryOrder'] = array_values($categoryOrder);
                        $newArray['valueOrder'] = array_values($valueOrder);
                    }
                }
            }
        }

        return $this->sortedData = json_encode($newArray);
    }
}