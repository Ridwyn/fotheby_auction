<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;

class Client {
    private $dbtables;

    public function __construct(...$params) {
        $this->dbtables = Helper::db_array_column($params);
    }


    public function editForm(){
      $client=null;
      if (isset($_GET['id'])) {
         $client = $this->dbtables['user']->findByID($_GET['id'])[0];

      } else {
         $client = false;
      }
      return [
         'template' => 'clientForm.html.php',
         'variables' => ['client'=>$client],
         'title' => 'Client'
      ];
    }

    public function editSubmit(){
      $client = $_POST['client'];
      $this->dbtables['user']->save($client);
      header('location: /admin/dashboard');
   }
   public function list(){
        $users=$this->dbtables['user']->findAll();
        $clients=[];
        foreach ($users as $key => $user) {
          if (strval($user['usertype'])=='client') {
            $clients[$key]=$user;
          }
        }
        return[
            'template'=>'clientList.html.php',
            'title' => 'Clients',
            'variables'=>['clients'=>$clients]
        ];
    }
}
