<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;


class Admin {
    private $dbtables;

    public function __construct(...$params) {
        $this->dbtables=Helper::db_array_column($params);
    }

    public function dashboard(){

      return[
        'template'=>'adminPanel.html.php',
        'title'=>'Admin',
        'variables'=>['data'=>[]],
      ];
    }

    public function list(){
        $staffs=$this->dbtables['users']->find('user_type','staff');
        return[
            'template'=>'staffList.html.php',
            'title'=>'staffList.html.php',
            'variables'=>['staffs'=>$staffs],
        ];
    }

    public function editSubmit(){
        $user = $_POST['user'];
        $this->dbtables['users']->save($user);
        header('location: /staff/list');
     }

     public function editForm(){
        $user=null;
        if (isset($_GET['id'])) {
           $user = $this->dbtables['users']->findByID($_GET['id'])[0];

        } else {
           $user = false;
        }
        return [
           'template' => 'signupForm.html.php',
           'variables' => ['user'=>$user],
           'title' => 'Edit User'
        ];

    }
}
