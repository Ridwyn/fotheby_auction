<main class="container">
    <h4 class="text-center">Catalogue View/Edit</h4>

  <form action="" method="POST" class="p-3 my-3  row justify-content-center border rounded w-75 mx-auto">
    <div class="col-md-6 row">
        <div class="form-group col-md-12">
            <input type="hidden"  name="catalogue[id]" value="<?=$catalogue['id'] ?? '' ?>" />
            <input type="hidden"   name="catalogue[date_created]" value="<?=$catalogue['date_created'] ?? (str_replace(' ','T',(new \DateTime())->format('Y-m-d H:i'))) ?>"  class="p-3"/>
            </div>

            <div class="form-group col-md-12 col-md-6">
            <label for="exampleInputEmail1">Auction Title</label>
            <input name="catalogue[auction_title]" value="<?=$catalogue['auction_title'] ?? '' ?>" type="text" class="form-control" id="exampleInput" aria-describedby="emailHelp" placeholder="Enter Auction title">
            </div>
            <div class="form-group col-md-12">
            <label for="exampleInputfname">Location</label>
            <input name="catalogue[location]" value="<?=$catalogue['location'] ?? '' ?>" type="text" class="form-control" id="exampleInput" aria-describedby="nameHelp" placeholder="Enter Location">
            </div>

            <div class=" col-md-12 text-center">
            <input type="submit" class="btn btn-primary  " value="Save"/>
            </div>
    </div>  


    
  </form>



</main>
