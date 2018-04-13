<?php

use \app\inc\Route;

Route::add("extensions/multisearch/api/search/{user}/{uuid}",

    function () {
        $db = Route::getParam("user");
        $dbSplit = explode("@", $db);
        if (sizeof($dbSplit) == 2) {
            $db = $dbSplit[1];
        }
        \app\models\Database::setDb($db);
    }

);