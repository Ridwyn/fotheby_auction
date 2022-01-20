<main class="container">
    <h4 class="text-center">Set time for Item Auction</h4>
    <div class="row text-center">
        <div class="col-12 mb-3">
        <div class="row border rounded">
            <div class="col-6 border-right p-2"> Item</div>
            <div class="col-6 p-2">Select Start & End Date and Time</div>
        </div>
        </div>

    <?php
      $itemList='';
      foreach ($items as $key => $item) {
          
        $itemDateTimeForm='<form action="" method="POST">
        <input  name="catalogue_id"  value="'.$catalogue['id'].'" hidden>
        <input  name="item_id"  value="'.$item['id'].'" hidden>
        <div>
            <label>Start time: </label>
            <input type="datetime-local" name="auction_date" value="'.$item['auction_date'].'"/>
        </div>
        <div>
            <label>End time: </label>
            <input type="datetime-local" name="auction_enddate" value="'.$item['auction_enddate'].'"/>
        </div>
            
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