<?php
namespace Classes\Controllers;
use Classes\Helpers\Helper;

class Bid {
    private $dbtables;

    public function __construct(...$params) {
        $this->dbtables = Helper::db_array_column($params);
    }



    public function liveBidcatalogue(){
        $res=null;
        foreach (($this->dbtables['catalogue']->findAll()) as $key => $catalogue) {
            if (!is_null($catalogue['auction_enddate'])) {
                $enddate=str_replace('T',' ',$catalogue['auction_enddate']);
                $startdate=str_replace('T',' ',$catalogue['auction_date']);
                if ((\DateTime::createFromFormat('Y-m-d H:i', $enddate)->format('U')) >= ((new \DateTime())->format('U'))) {
                   
                    if ((\DateTime::createFromFormat('Y-m-d H:i', $startdate)->format('U')) <= ((new \DateTime())->format('U')) ) {
                            $res=$catalogue;
                        } 
                }
           }
        }

        return[
            'template'=>'liveBidCatalogue.html.php',
            'title' => 'Catalogue',
            'variables'=>['catalogue'=>$res]
        ];
    }
    public function joinBid(){
        $res=null;
        $catalogue=$this->dbtables['catalogue']->findByID($_GET['catalogue_id'])[0];
        foreach (($this->dbtables['item']->find('catalogue_id',$_GET['catalogue_id'])) as $key => $item) {
            if (!is_null($item['auction_enddate'])) {
                $enddate=str_replace('T',' ',$item['auction_enddate']);
                $startdate=str_replace('T',' ',$item['auction_date']);
                if ((\DateTime::createFromFormat('Y-m-d H:i', $enddate)->format('U')) >= ((new \DateTime())->format('U'))) {
                   
                    if ((\DateTime::createFromFormat('Y-m-d H:i', $startdate)->format('U')) <= ((new \DateTime())->format('U')) ) {
                            $res=$item;
                        } 
                }
           }
        }
    
        $minimumBidAmount=null;
       $bid= $this->dbtables['bid']->find('item_id',$res['id']);
       if (isset($bid[0])) {
           
        $minimumBidAmount=$bid[0]['bid_amount'];
        
       }else{
        $minimumBidAmount=$res['bid_amount'];
       }
       
        return[
            'template'=>'bidItemForm.html.php',
            'title' => 'Item Bidding',
            'variables'=>['item'=>$res, 'minimumBidAmount'=>$minimumBidAmount]
        ];
    }

    public function bid(){
        $bidData=$_POST['bid'];
        $minimumBidAmount=$_POST['minimumBidAmount'];
        $bid= $this->dbtables['bid']->find('item_id',$bidData['item_id']);


        if (!isset($bid[0])  && (intval($minimumBidAmount) <= intval($bidData['bid_amount'])) ) {
            $this->dbtables['bid']->save($bidData);
            return header('location: /join/bid?catalogue_id='.$_POST['bid']['catalogue_id'].'');

        }
        if(isset($bid[0]) && (intval($bidData['bid_amount']) > intval($bid[0]['bid_amount']))){
            $bid[0]['bid_amount']=$bidData['bid_amount'];
            $minimumBidAmount=$bid[0]['bid_amount'];
            $this->dbtables['bid']->save($bid[0]);
            return header('location: /join/bid?catalogue_id='.$_POST['bid']['catalogue_id'].'');
        }
        if ((intval($minimumBidAmount) > intval($bidData['bid_amount']))) {
            return header('location: /join/bid?catalogue_id='.$_POST['bid']['catalogue_id'].'&error=lowbid');
        }
    }

}
