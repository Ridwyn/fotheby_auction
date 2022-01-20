<main class="container">

   <?php
      $itemList='';
      foreach ($items as $key => $item) {

        $editBtn="";

        $viewItem= "<span class=''><a href='/item/view?item_id={$item['id']}' class=' p-1'><i class='fas fa-info-circle'></i> View</a></span>" ;

        $div="<div class='col my-2'>
        <div class='card ' style='width: 18rem;'>
        <div class='card-body'>
          <h5 class='card-title'>{$item['title']}</h5>
          <h6 class='card-subtitle mb-2 text-muted'>{$item['artist']}</h6>
          <p class='card-text'>{$item['description']}</p>
          {$viewItem}
        </div>
        </div>
        </div>";
        $itemList.=$div;
        }
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">'.$itemList.'</div>';

     ?>


</main>
