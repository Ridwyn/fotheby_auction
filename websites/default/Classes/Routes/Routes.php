<?php

namespace Classes\Routes;


class Routes implements \GENERAL\Routes {
    public $authentication;
    public $categoryTable;
	public function getRoutes(): array  {
        include __DIR__ . '/../../Connection/pdo.php';


        // IMPORT ALL DATABASES NEEDED BY CONTROLLERS
        // $applicantsTable = new \GENERAL\DatabaseTable($pdo, 'applicants', 'id');
        $categoryTable = new \GENERAL\DatabaseTable($pdo, 'category', 'id');
        $this->categoryTable=$categoryTable;
        $userTable = new \GENERAL\DatabaseTable($pdo, 'user', 'id');
        $itemTable = new \GENERAL\DatabaseTable($pdo, 'item', 'id');
        $catalogueTable = new \GENERAL\DatabaseTable($pdo, 'catalogue', 'id');
        $bidTable = new \GENERAL\DatabaseTable($pdo, 'bid', 'id');
        // $enquiryTable = new \GENERAL\DatabaseTable($pdo, 'enquiry', 'id');


        // LOAD IN CONTROLLERS WITH RIGHT DATABASE MODEL NEEDED BY THE ROUTES
        $authentication = new \Classes\Controllers\Authentication($userTable);
        $this->authentication=$authentication;



        $loginController = new \Classes\Controllers\Login($authentication);
        $signupController = new \Classes\Controllers\Signup($authentication);
        $homeController = new \Classes\Controllers\Home($itemTable,$categoryTable,$catalogueTable,$itemTable);
        $adminController = new \Classes\Controllers\Admin();


        $dashboardController = new \Classes\Controllers\Dashboard();

        $clientController = new \Classes\Controllers\Client($userTable);
        $itemController = new \Classes\Controllers\Item($itemTable,$userTable,$catalogueTable);
        $catalogueController = new \Classes\Controllers\Catalogue($catalogueTable,$itemTable,$userTable);
        $auctionController = new \Classes\Controllers\Auction($catalogueTable,$itemTable,$userTable);
        $bidController = new \Classes\Controllers\Bid($catalogueTable,$itemTable,$userTable,$bidTable);



        $routes= [
            '' => [
                'GET' => [
                    'controller' => $homeController,
                    'function' => 'home'
                ],
            ],
            'unauthorised' => [
                'GET' => [
                    'controller' => $authentication,
                    'function' => 'unauthorised'
                ],
            ],
            '404' => [
                'GET' => [
                    'controller' => $authentication,
                    'function' => 'error404'
                ],
            ],
            'home' => [
                'GET' => [
                    'controller' => $homeController,
                    'function' => 'home'
                ],
            ],
            'item/view' => [
                'GET' => [
                    'controller' => $itemController,
                    'function' => 'view'
                ],
            ],
            'about' => [
                'GET' => [
                    'controller' => $homeController,
                    'function' => 'about'
                ],
            ],
            'login' => [
              'GET' => [
                  'controller' => $loginController,
                  'function' => 'login'
              ],
              'POST' => [
                  'controller' => $loginController,
                  'function' => 'loginSubmit'
              ],
          ],
            'admin/signup' => [
              'GET' => [
                  'controller' => $signupController,
                  'function' => 'adminSignup'
              ],
              'POST' => [
                  'controller' => $signupController,
                  'function' => 'adminSignupSubmit'
              ],
          ],
          'admin/dashboard' => [
              'GET' => [
                  'controller' => $adminController,
                  'function' => 'dashboard'
              ],
              'loggedin' => true,
              'access'=>['admin'=>true,'client'=>false]
          ],
          'logout' => [
              'GET' => [
                  'controller' => $loginController,
                  'function' => 'logout'
              ]
          ],
          'admin/item/edit' => [
            'GET' => [
                'controller' => $itemController,
                'function' => 'editForm'
            ],
            'POST' => [
                'controller' => $itemController,
                'function' => 'editSubmit'
            ],
        ],
          'admin/item/waiting' => [
              'GET' => [
                  'controller' => $itemController,
                  'function' => 'waiting'
              ],
              'loggedin' => true,
              'access'=>['admin'=>true,'client'=>false]
          ],
          'admin/item/evaluating' => [
              'GET' => [
                  'controller' => $itemController,
                  'function' => 'evaluating'
              ],
              'loggedin' => true,
              'access'=>['admin'=>true,'client'=>false]
          ],
          'admin/item/approved' => [
              'GET' => [
                  'controller' => $itemController,
                  'function' => 'approved'
              ],
              'loggedin' => true,
              'access'=>['admin'=>true,'client'=>false]
          ],
          'admin/item/auction' => [
              'GET' => [
                  'controller' => $itemController,
                  'function' => 'auction'
              ],
              'loggedin' => true,
              'access'=>['admin'=>true,'client'=>false]
          ],
          'admin/catalogue/edit' => [
            'GET' => [
                'controller' => $catalogueController,
                'function' => 'editForm'
            ],
            'POST' => [
                'controller' => $catalogueController,
                'function' => 'editSubmit'
            ],
        ],
          'admin/catalogue/list' => [
            'GET' => [
                'controller' => $catalogueController,
                'function' => 'list'
            ]
        ],
          'admin/catalogue/item/edit' => [
            'GET' => [
                'controller' => $catalogueController,
                'function' => 'itemToCatalogueForm'
            ],
            'POST' => [
                'controller' => $catalogueController,
                'function' => 'itemToCatalogueSubmit'
            ]
        ],
          'admin/catalogue/item/list' => [
            'GET' => [
                'controller' => $catalogueController,
                'function' => 'itemsInCatalogue'
            ]
        ],
        'admin/auction/catalogue/edit' => [
            'GET' => [
                'controller' => $auctionController,
                'function' => 'editform'
            ],
            'POST' => [
                'controller' => $auctionController,
                'function' => 'editSubmit'
            ],
        ],
        'admin/auction/item/edit' => [
            'GET' => [
                'controller' => $auctionController,
                'function' => 'auctionItemsForm'
            ],
            'POST' => [
                'controller' => $auctionController,
                'function' => 'auctionItemsFormSubmit'
            ],
        ],
        'admin/auction/list' => [
            'GET' => [
                'controller' => $auctionController,
                'function' => 'list'
            ]
        ],
          'dashboard' => [
              'GET' => [
                  'controller' => $dashboardController,
                  'function' => 'dashboard'
              ],
              'loggedin' => true,
              'access'=>['admin'=>true,'client'=>true]
          ],
          'client/edit' => [
            'GET'=>[
                'controller' => $clientController,
                'function' => 'editForm'
            ],
            'POST'=>[
                'controller' => $clientController,
                'function' => 'editSubmit'
            ],
          ],
          'client/list' => [
              'GET' => [
                  'controller' => $clientController,
                  'function' => 'list'
              ],
          ],
          'client/item/edit' => [
            'GET'=>[
                'controller' => $itemController,
                'function' => 'editForm'
            ],
            'POST'=>[
                'controller' => $itemController,
                'function' => 'editSubmit'
            ],
          ],
          'client/item/list' => [
            'GET'=>[
                'controller' => $itemController,
                'function' => 'list'
            ]
          ],
          'client/item/evaluate' => [
            'GET'=>[
                'controller' => $itemController,
                'function' => 'evaluate'
            ]
          ],
          'cleint/auction/list' => [
            'GET'=>[
                'controller' => $auctionController,
                'function' => 'list'
            ]
          ],
          'live/bid/catalogue'=>[
            'GET'=>[
                'controller' => $bidController,
                'function' => 'liveBidcatalogue'
            ]
          ],
          'join/bid'=>[
            'GET'=>[
                'controller' => $bidController,
                'function' => 'joinBid'
            ],
            'POST'=>[
                'controller' => $bidController,
                'function' => 'bid'
            ]
          ],

        ];

        return $routes;

    }

    public function getAuth() {
        return $this->authentication;
    }

    // Check user loggin and access level
    public function checkLogin($routes,$routeUrl){

        $accessRoutes=[];

        // Check for login and run all route when not logged in
        if (!$this->getAuth()->isLoggedIn()) {
		    foreach ($routes as $key => $route) {
                if(!isset($route['loggedin'])){
                    $data[$key]=$route;
                    $accessRoutes+=$data;
                }
            }
        }

        // Check for protected User access Level after login when user type is set
        if($this->getAuth()->isLoggedIn() && isset($_SESSION['user']['usertype'])){
                $accessRoutes=$this->checkRouteAccess($routes,$_SESSION['user']['usertype']);
        }
        // Check for protected User access Level after login when user type is not set
        if($this->getAuth()->isLoggedIn() && !isset($_SESSION['user']['usertype'])){
          foreach ($routes as $key => $route) {
                  if(!isset($route['loggedin'])){
                      $data[$key]=$route;
                      $accessRoutes+=$data;
                  }
              }
        }

        // Redirect if trying to acces unauthorised pages and 404 does not exist
        if (!array_key_exists($routeUrl,$accessRoutes) && array_key_exists($routeUrl,$routes)) {
            return header('location: /unauthorised');
        }
        // 404 redirect
        if (!array_key_exists($routeUrl,$accessRoutes) && !array_key_exists($routeUrl,$routes)) {
            return header('location: /404');
        }


        return $accessRoutes;
    }

    // Function to filter access level from routes
    public function checkRouteAccess(array $arr, string $accesslevel){
		$accessRoutes=[];
		foreach ($arr as $key => $route) {
			if(isset($route['access']) &&$route['access'][$accesslevel]){
				$data[$key]=$route;
				$accessRoutes+=$data;
			}
			if(!isset($route['loggedin'])){
				$data[$key]=$route;
				$accessRoutes+=$data;
			}
		}
		return $accessRoutes;
	}



    public function getVarsForLayout($title, $output): array {

        $loggedIn = $this->getAuth()->isLoggedIn();
        $categories = $this->categoryTable->findAll();
         return [
             'title' => $title,
             'output' => $output,
             'categories'=>$this->categoryTable->findAll(),
            'loggedIn' => $loggedIn
         ];
     }
}
