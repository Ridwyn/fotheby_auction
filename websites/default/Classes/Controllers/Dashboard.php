<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;

class Dashboard {
    private $dbtables;

    public function __construct(...$params) {
        $this->dbtables = Helper::db_array_column($params);
    }


    public function dashboard(){
        return[
            'template'=>'dashboard.html.php',
            'title'=>' Dashbaord',
            'variables'=>[],
        ];
    }
}
