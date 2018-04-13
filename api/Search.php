<?php

namespace app\extensions\multisearch\api;

use \app\conf\App;
use \app\inc\Response;
use \app\models\Database;
use \app\conf\Connection;
use \app\inc\Session;
use \app\inc\Input;
use \app\inc\Model;
use \app\models\Table;
use \app\inc\Route;

/**
 * Class Multisearch
 * @package app\extensions\multisearch\api
 */
class Search extends \app\inc\Controller
{

    function __construct()
    {
        parent::__construct();

    }

    /**
     * @return array
     */
    public function get_index() {

        $response = [];

        $search = new \app\extensions\multisearch\models\Search();

        $res = $search->getUuid(Route::getParam("schema"), Route::getParam("uuid"));

        $response['message'] = "";
        $response['success'] = true;
        $response['data'] = $res;

        return $response;
    }
}