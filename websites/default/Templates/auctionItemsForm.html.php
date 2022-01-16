<main class="container">
    <h4 class="text-center">Set time for Item Auction</h4>
    <div class="row text-center">
        <div class="col-12 mb-3">
        <div class="row border rounded">
            <div class="col-6 border-right p-2"> Item</div>
            <div class="col-6 p-2">Select Date and Time</div>
        </div>
        </div>

    <?php
      $itemStatuses= array("n/a","evaluating", "waiting", "auction", "approved");
      $itemList='';
      foreach ($items as $key => $item) {
        //   $options='';
        // foreach ($catalogues as $key => $catalogue) {
        //    $options.= '<option value="'.$catalogue['id'].'">
        //     '.$catalogue['auction_title's].'
        //     </option>';
            
        // }
        $itemDateTimeForm='<form action="" method="POST">
        <input  name="catalogue_id"  value="'.$catalogue['id'].'" hidden>
        <input  name="item_id"  value="'.$item['id'].'" hidden>
        <input type="datetime-local" name="auction_date" value="'.$item['auction_date'].'"/>
            <input type="submit" class="btn btn-primary" value="Save"/>
        </form>';

        


        $div="<div class='row border rounded'>
        <div class='col-6 border-right p-2'>
        {$item['title']}
        </div>
        <div class='col-6  p-2'> {$itemDateTimeForm} </div>
        </div>";
        $itemList.=$div;
      }
        echo '<div class="col-12 mb-3">'.$itemList.'</div>';

     ?>


    </div>

</main>