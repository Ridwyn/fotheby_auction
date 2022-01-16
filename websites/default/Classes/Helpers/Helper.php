<?php

namespace Classes\Helpers;

class Helper  {

    public static function db_array_column($params){
        $tables=[];
        foreach ($params as $key => $param) {
            $tables[$param->table]=$param;
        }
        
        return $tables;
    }


}