<?php

use \app\inc\Route;

Route::add("extensions/multisearch/api/search/{db}/{schema}/{uuid}",

    function () {
        $db = Route::getParam("db");
        \app\models\Database::setDb($db);
    }

);