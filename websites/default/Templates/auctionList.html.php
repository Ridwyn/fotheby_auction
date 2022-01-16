<main class="container">

  <div class="row text-center">
    <div class="col-12 mb-3">
      <div class="row border rounded">
        <div class="col-3 border-right p-2">Catalogue Title</div>
        <div class="col-3 border-right p-2">Location</div>
        <div class="col-3 border-right p-2">Auction date</div>
        <div class="col-3  p-2">View All Items </div>
      </div>
    </div>

   <?php
      $itemStatuses= array("n/a","evaluating", "waiting", "auction", "approved");
      $catalogueList='';
      foreach ($catalogues as $key => $catalogue) {

        $editBtn="";

        $viewItems= "<span class=''><a href='/admin/catalogue/item/list?id={$catalogue['id']}' class=' p-1'><i class='fas fa-info-circle'></i></a></span>" ;

        $div="<div class='row border rounded'>
        <div class='col-3 border-right p-2'>
        <span class='float-left'><a href='/admin/catalogue/edit?id={$catalogue['id']}' class=' p-1'><i class='far fa-edit'></i></a></span>
        {$catalogue['auction_title']}
        </div>
        <div class='col-3 border-right p-2'> {$catalogue['location']} </div>
        <div class='col-3 border-right p-2'>{$catalogue['auction_date']} </div>
        <div class='col-3  p-2'>
        <span> {$viewItems}</span>

        </div>
        </div>";
        $catalogueList.=$div;
      }
    echo '<div class="col-12 mb-3">'.$catalogueList.'</div>';

     ?>


</main>
