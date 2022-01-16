<?php
namespace Classes\Controllers;

class Signup {
    private $authentication;

    public function __construct( $authentication ) {
         $this->authentication = $authentication;
    }
    //Displays login page
    public function signup() {
        return ['template' => 'signupForm.html.php',
            'title' => 'Signup',
            'variables' => ['error'=>'' ]

        ];
    }

    //Handles request to login, authenticates the credentials.
    public function signupSubmit() {
      $this->authentication->signup($_POST);
        // if ($this->authentication->login($_POST['email'], $_POST['password'])) {
        //     header('location: /dashboard');
        // }
        // else {
        //     return ['template' => 'signup.html.php',
        //         'title' => 'Signup',
        //         'variables' => [ 'error'=>'Username or Password might be incorrect'  ]
        //     ];
        // }
    }

    public function adminSignup() {
        return ['template' => 'signupForm.html.php',
            'title' => 'Signup',
            'variables' => ['error'=>'' ]

        ];
    }

    //Handles request to login, authenticates the credentials.
    public function adminSignupSubmit() {
      $this->authentication->signup($_POST);
    }




}
