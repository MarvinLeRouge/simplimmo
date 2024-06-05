<?php

namespace Simplimmo\Services;

class Utils {

    public static function buildUrl($txt_params, $id) {
        $result = '';
        $items = [];

        foreach($txt_params as $param) {
            $param = strtolower($param);
            $param = trim($param, " -");
            $param = str_replace("²", "2", $param);
            $param = preg_replace("/\s+/", "-", $param);
            $param = preg_replace("/[\-_]+/", "-", $param);
            $param = preg_replace('/[^a-z0-9_\-]/i', "", $param);
            $items[] = $param;
        }
        if(count($items) > 1) {
            $items[1] = $items[0] . "/" . $items[1];
            array_shift($items);

        }
        $items[] = $id;

        $result = implode("-", $items);

        return $result;




    }

    public static function stdReplace($word) {
        $replace = [
            "house" => "maison",
            "apartment" => "appartement",
        ];
        $result = $replace[$word] ?? $word;

        return $result;
    }

}
