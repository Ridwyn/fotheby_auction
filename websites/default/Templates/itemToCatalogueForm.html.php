<main class="container">
    <div class="row text-center">
        <div class="col-12 mb-3">
        <div class="row border rounded">
            <div class="col-6 border-right p-2">Approved Items</div>
            <div class="col-6 p-2">Select Catalogue</div>
        </div>
        </div>

    <?php
      $itemStatuses= array("n/a","evaluating", "waiting", "auction", "approved");
      $itemList='';
      foreach ($items as $key => $item) {
          $options='';
        foreach ($catalogues as $key => $catalogue) {
           $options.= '<option value="'.$catalogue['id'].'">
            '.$catalogue['auction_title'].'
            </option>';
            
        }
        $catalogueSelectForm='<form action="" method="POST">
        <input  name="item_id"  value="'.$item['id'].'" hidden>
        <select name="catalogue_id">'.$options.'</select>
            <input type="submit" class="btn btn-primary" value="Save"/>
        </form>';

        


        $div="<div class='row border rounded'>
        <div class='col-6 border-right p-2'>
        {$item['title']}
        </div>
        <div class='col-6  p-2'> {$catalogueSelectForm} </div>
        </div>";
        $itemList.=$div;
      }
        echo '<div class="col-12 mb-3">'.$itemList.'</div>';

     ?>


    </div>

</main>