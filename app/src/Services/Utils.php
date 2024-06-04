<?php

namespace Simplimmo\Services;

class Utils {

    public static function buildUrl($txt_params, $id) {
        $result = '';
        $items = [];

        foreach($txt_params as $param) {
            $param = strtolower($param);
            $param = trim($param, " -");
            $param = preg_replace("/\s+/", "-", $param);
            $param = preg_replace("/[\-]+/", "-", $param);
            $items[] = $param;
        }
        $items[] = $id;
        zdebug($items);

        $result = implode($items, "-");

        return $result;




    }

}
