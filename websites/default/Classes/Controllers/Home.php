<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;


class Home {
    private $dbtables;

    public function __construct(...$params) {
       $this->dbtables=Helper::db_array_column($params);
    }

    public function home(){
        $items=array_slice($this->dbtables['item']->find('track_status','auction'),0,10);
        return[
            'template'=>'home.html.php',
            'title' => 'Homepage',
            'variables'=>['items'=>$items],
        ];
    }


    public function about(){
        return[
            'template'=>'about.html.php',
            'title' => 'Abut',
            'variables'=>[],
        ];
    }




}
