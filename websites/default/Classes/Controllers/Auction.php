<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;

class Auction {
    private $dbtables;

    public function __construct(...$params) {
        $this->dbtables = Helper::db_array_column($params);
    }


    
    public function editForm(){
        $catalogues=[];
        if (isset($_GET['edit_all_auction']) && $_GET['edit_all_auction']=='0') {
            foreach (($this->dbtables['catalogue']->findAll()) as $key => $catalogue) {
                if (is_null($catalogue['auction_date'])) {
                   array_push($catalogues,$catalogue);
               }
            }
        }else{
            $catalogues=$this->dbtables['catalogue']->findAll();
        }
    
        
   
   
        return[
            'template'=>'cataloguetoAuction.html.php',
            'title' => 'Catalogue',
            'variables'=>['catalogues'=>$catalogues]
        ];
    }

    public function editSubmit(){
        $catalogue = $_POST['catalogue'];
        $catalogue=$this->dbtables['catalogue']->findByID($_POST['catalogue_id'])[0];
        $catalogue['auction_date']=$_POST['auction_date'];
        // Save catalogue
        $this->dbtables['catalogue']->save($catalogue);
        $items =$this->dbtables['item']->find('catalogue_id',$_POST['catalogue_id']);
        foreach ($items as $key => $item) {
            $item['track_status']='auction';
            $item['auction_date']=$_POST['auction_date'];
            // Save item
            $this->dbtables['item']->save($item);
        }
        // $this->dbtables['catalogue']->save($catalogue);
        header('location: /admin/auction/item/edit?catalogue_id='.$_POST['catalogue_id'].'');
        
   }

    public function auctionItemsForm(){
      $items=[];
      $catalogue=$this->dbtables['catalogue']->find('id',$_GET['catalogue_id'])[0];
      $items = $this->dbtables['item']->find('catalogue_id',$_GET['catalogue_id']);
        

      return [
        'template' => 'auctionItemsForm.html.php',
        'variables' => ['catalogue'=>$catalogue,'items'=>$items],
        'title' => 'Catalogue'
     ];
    }

    public function auctionItemsFormSubmit(){
        $item_id = $_POST['item_id'];
        $item_auction_date = $_POST['auction_date'];
        $catalogue_id = $_POST['catalogue_id'];

        $item = $this->dbtables['item']->findByID($item_id)[0];
        $item['auction_date']=$_POST['auction_date'];
        $this->dbtables['item']->save($item);

        header('location: /admin/auction/item/edit?catalogue_id='.$_POST['catalogue_id'].'');

   }
   

   public function list(){
     $catalogues=[];
     $futureCatalogues=[];
     $pastCatalogues=[];
    
     
     foreach (($this->dbtables['catalogue']->findAll()) as $key => $catalogue) {
         if (!is_null($catalogue['auction_date'])) {
            array_push($catalogues,$catalogue);
        }
     }


    //  Prepare to check against future and past auctions
    foreach ($catalogues as $key => $catalogue) {
        $d=str_replace('T',' ',$catalogue['auction_date']);
       if ((\DateTime::createFromFormat('Y-m-d H:i', $d)->format('U')) > ((new \DateTime())->format('U')) ) {
         array_push($futureCatalogues,$catalogue);
       }
       if ((\DateTime::createFromFormat('Y-m-d H:i', $d)->format('U')) < ((new \DateTime())->format('U')) ) {
        array_push($pastCatalogues,$catalogue);
       }
    }
    $res=null;
    if ($_GET['sort']=='past') {
        $res=$pastCatalogues;
    }
    if ($_GET['sort']=='future') {
        $res=$futureCatalogues;
    }


     return[
         'template'=>'auctionList.html.php',
         'title' => 'Catalogue',
         'variables'=>['catalogues'=>$res]
     ];
    }
}
