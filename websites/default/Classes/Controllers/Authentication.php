<?php
namespace Classes\Controllers;

use CSY2028\DatabaseTable;

class Authentication {
    public $userTable;

    public function __construct($userTable) {
        session_start();
        $this->userTable = $userTable;
    }

    public function login($email, $password) {
        $user = $this->userTable->find('email', $email);

        // if (!empty($user) && password_verify($password, $user[0]->{$this->passwordColumn})) {
        //     session_regenerate_id();
        //     $_SESSION['username'] = $username;
        //     $_SESSION['password'] = $user[0]->{$this->passwordColumn};
        //     $_SESSION['usertype']
        //     return true;
        // }
        if(!empty($user) && $email== $user[0]['email'] && $password == $user[0]['password']){
            $_SESSION['user'] = $user[0];
            return true;
        }
        else {
            return false;
        }
    }

    public function isLoggedIn() {
        if (empty($_SESSION['user'])) {
            return false;
        }

        $user = $this->userTable->find('email', $_SESSION['user']['email']);

        if (!empty($user)) {
          return true;
        }

        // if (!empty($user) && $user[0]['password']== $_SESSION['user']['password']) {
        //     return true;
        // }
        else {
            return false;
        }
    }

    public function signup($admin_data) {
        $this->userTable->save($admin_data);
         header('location: /admin/dashboard');
    }


    public function unauthorised(){
        return[
            'template'=>'unauthorised.html.php',
            'title' => 'Unauthorised',
            'variables'=>[],
        ];
    }
    public function error404(){
        return[
            'template'=>'error404.html.php',
            'title' => '404',
            'variables'=>[],
        ];
    }

    // public function getUser() {
    //     if ($this->isLoggedIn()) {
    //         return $this->userTable->find('username', strtolower($_SESSION['username']))[0];
    //     }
    //     else {
    //         return false;
    //     }
    // }
}
