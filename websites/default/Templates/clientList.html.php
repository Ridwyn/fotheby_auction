<main class="container">

<section class="">

<h2>Clients</h2>

<div class="row text-center">
  <div class="col-12 mb-3">
    <div class="row border rounded">
      <div class="col-3 border-right p-2">Email</div>
      <div class="col-3 border-right p-2">Client Status</div>
      <div class="col-3 border-right p-2">Telephone</div>
      <div class="col-3  p-2">Buyer Approved </div>
    </div>
  </div>

 <?php
    $clientList='';
    foreach ($clients as $key => $client) {
      $div="<div class='row border rounded'>
      <div class='col-3 border-right p-2'>{$client['email']}</div>
      <div class='col-3 border-right p-2'>{$client['status']}</div>
      <div class='col-3 border-right p-2'>{$client['telephone']}</div>
      <div class='col-3  p-2'>
      <span>{$client['buyer_approved_status']}</span>
      <span><a href='/client/edit?id={$client['id']}'><i class='fas fa-user-edit'></i></a></span>
      </div>
      </div>";
      $clientList.=$div;
    }
  echo '<div class="col-12 mb-3">'.$clientList.'</div>';

   ?>

</div>

</section>
</main>
