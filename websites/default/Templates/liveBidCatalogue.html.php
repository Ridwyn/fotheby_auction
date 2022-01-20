<main class="container">

  <div class="row text-center">
    <div class="col-12 mb-3">
      <div class="row border rounded">
        <div class="col-3 border-right p-2">Catalogue Title</div>
        <div class="col-3 border-right p-2">Location</div>
        <div class="col-3 border-right p-2">Auction date</div>
        <div class="col-3  p-2">Join Auction </div>
      </div>
    </div>

    <?php
    $div='';
    if (!is_null($catalogue) ) {
        $div='<div class="row text-center">
            <div class="col-12 mb-3">
            <div class="row border rounded">
                <div class="col-3 border-right p-2">'.$catalogue['auction_title'].'</div>
                <div class="col-3 border-right p-2">'.$catalogue['location'].'</div>
                <div class="col-3 border-right p-2">Auction date</div>
                <div class="col-3  p-2">
                    <span><a href="/join/bid?catalogue_id='.$catalogue['id'].'" class="btn btn-primary">Join Auction</a></span>
                </div>
            </div>
            </div>';
        
        
    }else{
        $div='<h4 class="text-center">Check Back Later for when auction starts</h4>';
    }
    echo $div;

    ?>
  


</div>


</main>