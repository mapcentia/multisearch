<?php

namespace app\extensions\multisearch\models;

use app\inc\Model;
use app\conf\Connection;
use app\conf\App;
use app\inc\Util;

class Search extends Model
{
    function __construct()
    {

        parent::__construct();


    }

    public function getUuid($uuid)
    {
        $model = new \app\models\Layer();
        $layers = $model->getAll("feature", false);

        foreach ($layers["data"] as $layer) {

            $rel = $layer["f_table_schema"] . "." . $layer["f_table_name"];

            $sql = "SELECT * FROM {$rel} WHERE gid=:uuid";

            $res = $this->prepare($sql);

            try {
                $res->execute(["uuid" => $uuid]);
                $row = $this->fetchRow($res, "assoc");
                if (isset($row["gid"])) {
                    return [
                        "rel" => $rel,
                        "uuid" => $uuid
                    ];

                }
            } catch (\PDOException $e) {
                //echo $e->getMessage();
            }


        }
    }
}