<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;

class Item {
    private $dbtables;

    public function __construct(...$params) {
        $this->dbtables = Helper::db_array_column($params);
    }


    public function editForm(){
      $item=null;
      $catalogues=null;
      $selectdCatalogue=null;
      if (isset($_GET['id'])) {
         $item = $this->dbtables['item']->findByID($_GET['id'])[0];
         $catalogues = $this->dbtables['catalogue']->findAll();
         if (isset($item['catalogue_id'])) {
          $selectdCatalogue = $this->dbtables['catalogue']->findByID($item['catalogue_id'])[0];

         }

      } else {
         $item = false;
      }

      // Return based on User type Admin or Client
      if (strval($_SESSION['user']['usertype']) == 'client') {
        return [
           'template' => 'itemForm.html.php',
           'variables' => ['item'=>$item],
           'title' => 'Item'
        ];
      }else {
        
        return [
           'template' => 'adminItemForm.html.php',
           'variables' => ['item'=>$item,'catalogues'=>$catalogues,'selectdCatalogue'=>$selectdCatalogue],
           'title' => 'Item'
        ];
      }

    }

    public function editSubmit(){
      $item = $_POST['item'];
      $this->dbtables['item']->save($item);
      if (strval($_SESSION['user']['usertype']) == 'client') {
        header('location: /client/item/list');
      }else {
        header('location: /admin/dashboard');
      }

   }
    public function evaluate(){
      $itemId = $_GET['id'];
      $item=  $this->dbtables['item']->findByID($itemId)[0];
      $item['track_status']='waiting';
      $this->dbtables['item']->save($item);
      header('location: /client/item/list');
   }
   public function waiting(){
        $items=$this->dbtables['item']->find('track_status','waiting');
        return[
            'template'=>'adminItemList.html.php',
            'title' => 'Clients',
            'variables'=>['items'=>$items]
        ];
    }
   public function evaluating(){
     $items=$this->dbtables['item']->find('track_status','evaluating');
     return[
         'template'=>'adminItemList.html.php',
         'title' => 'Clients',
         'variables'=>['items'=>$items]
     ];
    }
   public function approved(){
     $items=$this->dbtables['item']->find('track_status','approved');
     return[
         'template'=>'adminItemList.html.php',
         'title' => 'Clients',
         'variables'=>['items'=>$items]
     ];
    }
   public function auction(){
     $items=$this->dbtables['item']->find('track_status','auction');
     return[
         'template'=>'adminItemList.html.php',
         'title' => 'Clients',
         'variables'=>['items'=>$items]
     ];
    }
   public function list(){
     $items=$this->dbtables['item']->find('seller_id',$_SESSION['user']['id']);
     return[
         'template'=>'itemList.html.php',
         'title' => 'Clients',
         'variables'=>['items'=>$items]
     ];
    }
}
