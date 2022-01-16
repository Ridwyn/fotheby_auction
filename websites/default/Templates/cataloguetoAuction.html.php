<main class="container">
    <h4 class="text-center">Catalogues to Auction</h4>
    <div class="row text-center">
        <div class="col-12 mb-3">
        <div class="row border rounded">
            <div class="col-6 border-right p-2"> Catalogue</div>
            <div class="col-6 p-2">Select Date and Time</div>
        </div>
        </div>

    <?php
      $itemStatuses= array("n/a","evaluating", "waiting", "auction", "approved");
      $itemList='';
      foreach ($catalogues as $key => $catalogue) {
        //   $options='';
        // foreach ($catalogues as $key => $catalogue) {
        //    $options.= '<option value="'.$catalogue['id'].'">
        //     '.$catalogue['auction_title'].'
        //     </option>';
            
        // }
        $catalogueDateTimeForm='<form action="" method="POST">
        <input  name="catalogue_id"  value="'.$catalogue['id'].'" hidden>
        <input type="datetime-local" name="auction_date" value="'.$catalogue['auction_date'].'"/>
            <input type="submit" class="btn btn-primary" value="Auction"/>
        </form>';

        


        $div="<div class='row border rounded'>
        <div class='col-6 border-right p-2'>
        {$catalogue['auction_title']}
        </div>
        <div class='col-6  p-2'> {$catalogueDateTimeForm} </div>
        </div>";
        $itemList.=$div;
      }
        echo '<div class="col-12 mb-3">'.$itemList.'</div>';

     ?>


    </div>

</main>