<?php

namespace MEAPI2;

use \MEAPI2\Model;

class MEAPI2 {
    const MODEL = [
        "\MEAPI2\Model\zaif",
        "\MEAPI2\Model\ccex"
    ];

    private $loadModel = [];

    public function __construct() {
        foreach(self::MODEL as $model) {
            $keylist = explode('\\',$model);
            $key = $keylist[count($keylist)-1];
            $this->loadModel[$key] = [
                'name' => $model::NAME,
                'class' => $model
            ];
        }
    }

    public function supportList() {
        return $this->loadModel;
    }

    public function selecter($exName = ""){
        if(!array_key_exists($exName, $this->loadModel))
            return false;
        return $this->loadModel[$exName];
    }
}