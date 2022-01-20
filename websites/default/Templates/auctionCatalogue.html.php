<main class="container">
    <h4 class="text-center">Catalogues to Auction</h4>
    
        <?php
            if (isset($_GET['error'])) {
                echo '<p class="badge badge-danger">Live Auction Still On Going</p>';
            //    var_dump($_GET['error']);
            }
        ?>
    
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
        <div>
            <Label>Start Date</label>
            <input type="datetime-local" name="catalogue[auction_date]" value="'.$catalogue['auction_date'].'" required/>
        </div>
        <div>
            <label>End Date</label>
            <input type="datetime-local" name="catalogue[auction_enddate]" value="'.$catalogue['auction_enddate'].'" required/>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Auction"/>
        </form>';

        


        $div="<div class='row border rounded'>
        <div class='col-6 border-right p-2'>
        {$catalogue['auction_title']}
        </div>
        <div class='col-6  p-2'> {$catalogueDateTimeForm} </div>
        </div>";

        // Check for not null values and only display futre auction date
        if (!is_null($catalogue['auction_date'])) {
           $d=str_replace('T',' ',$catalogue['auction_date']);
            if ((\DateTime::createFromFormat('Y-m-d H:i', $d)->format('U')) < ((new \DateTime())->format('U')) ) {
            
                $div='';
            }
        } 
        
        $itemList.=$div;
      }
        echo '<div class="col-12 mb-3">'.$itemList.'</div>';

     ?>


    </div>

</main>