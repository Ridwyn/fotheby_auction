<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;

class Catalogue {
    private $dbtables;

    public function __construct(...$params) {
        $this->dbtables = Helper::db_array_column($params);
    }



    public function editForm(){
      $catalogue=null;
      $items=[];
      if (isset($_GET['id'])) {
         $catalogue = $this->dbtables['catalogue']->findByID($_GET['id'])[0];
         
         foreach ($this->dbtables['item']->find('track_status','approved') as $key => $item) {
            if (is_null($item['catalogue_id'])) {
               array_push($items,$item);
            }
         }

      } else {
         $catalogue = false;
      }

      return [
        'template' => 'catalogueForm.html.php',
        'variables' => ['catalogue'=>$catalogue],
        'title' => 'Catalogue'
     ];
    }

    public function editSubmit(){
        $catalogue = $_POST['catalogue'];
        $this->dbtables['catalogue']->save($catalogue);
        header('location: /admin/dashboard');

   }

    public function itemToCatalogueForm(){
      $items=[];
      $catalogues = $this->dbtables['catalogue']->findAll();
         
      foreach ($this->dbtables['item']->find('track_status','approved') as $key => $item) {
         if (is_null($item['catalogue_id'])) {
            array_push($items,$item);
         }
      }
      

      return [
        'template' => 'itemToCatalogueForm.html.php',
        'variables' => ['catalogues'=>$catalogues,'items'=>$items],
        'title' => 'Catalogue'
     ];
    }

    public function itemToCatalogueSubmit(){
        $item_id = $_POST['item_id'];
        $catalogue_id = $_POST['catalogue_id'];
        $item = $this->dbtables['item']->findByID($item_id)[0];
        $count= $this->dbtables['item']->findCount('catalogue_id',$catalogue['id']);

        $item['lot_number']=strval(intval($count['COUNT'])+1);
        $item['catalogue_id']=$catalogue_id;

        $this->dbtables['item']->save($item);
        header('location: /admin/dashboard');

   }
   

   public function list(){
     $catalogues=[];
    
     foreach (($this->dbtables['catalogue']->findAll()) as $key => $catalogue) {
       $count= $this->dbtables['item']->findCount('catalogue_id',$catalogue['id']);
       $catalogue['lotCount']=$count['COUNT'];
       array_push($catalogues,$catalogue);
     }

     return[
         'template'=>'catalogueList.html.php',
         'title' => 'Catalogue',
         'variables'=>['catalogues'=>$catalogues]
     ];
    }
   public function itemsInCatalogue(){
     $catalogue=$this->dbtables['catalogue']->findByID($_GET['id'])[0];
     $items=$this->dbtables['item']->find('catalogue_id',$_GET['id']);
    

     return[
        'template'=>'itemsInCatalogue.html.php',
         'title' => 'Catalogue',
         'variables'=>['catalogue'=>$catalogue,'items'=>$items]
     ];
    }
}
