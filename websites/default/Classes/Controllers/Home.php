<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;


class Home {
    private $dbtables;

    public function __construct(...$params) {
       $this->dbtables=Helper::db_array_column($params);
    }

    public function home(){
        $d=(new \DateTime)->format('Y-m-d');
        $items=$this->dbtables['item']->findAll();
        return[
            'template'=>'home.html.php',
            'title' => 'Homepage',
            'variables'=>['items'=>$items],
        ];
    }


    public function faqs(){
        return[
            'template'=>'faqs.html.php',
            'title' => 'Faqs',
            'variables'=>[],
        ];
    }




}
