<main class="container">

<div class="card text-center">
  <div class="card-header">
    <h4><?=$item['title']?></h4>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?=$item['artist']?></h5>
    <p class="card-text"><?=$item['description']?></p>
    <p class="card-text">£<?=$item['price_min']?>  -  <?=$item['price_max']?></p>
    <p class="card-text">Auction Date: <?=$item['auction_date']?></p>
  </div>
  <div class="card-footer text-muted">
   Dimensions: <?=$item['dimensions']?> | Framed In <?=$item['framed']?>
  </div>
</div>
</main>