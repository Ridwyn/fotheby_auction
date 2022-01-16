<main class="container">

  <div class="row text-center">
    <div class="col-12 mb-3">
      <div class="row border rounded">
        <div class="col-3 border-right p-2">Piece Title</div>
        <div class="col-3 border-right p-2">Price Range</div>
        <div class="col-3 border-right p-2">Item Evaluation Status</div>
        <div class="col-3  p-2">Artist </div>
      </div>
    </div>

   <?php
      $itemStatuses= array("n/a","evaluating", "waiting", "auction", "approved");
      $itemList='';
      foreach ($items as $key => $item) {

        $editBtn="";



        $div="<div class='row border rounded'>
        <div class='col-3 border-right p-2'>
        <span class='float-left'><a href='/admin/item/edit?id={$item['id']}' class=' p-1'><i class='far fa-edit'></i></a></span>
        {$item['title']}
        </div>
        <div class='col-3 border-right p-2'>£ {$item['price_min']} - {$item['price_max']} </div>
        <div class='col-3 border-right p-2'>{$item['track_status']} </div>
        <div class='col-3  p-2'>
        <span>{$item['artist']}</span>

        </div>
        </div>";
        $itemList.=$div;
      }
    echo '<div class="col-12 mb-3">'.$itemList.'</div>';

     ?>


</main>
