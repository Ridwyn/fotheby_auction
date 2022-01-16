<main class="container">
  <h4 class="text-center"> Item</h4>
  <form action="" method="POST" class="p-3 my-3  row justify-content-center border rounded w-75 mx-auto">
    <div class="form-group col-md-12">
      <input type="hidden"  name="item[id]" value="<?=$item['id'] ?? '' ?>" />
      <input type="hidden"  name="item[seller_id]" value="<?=$client['seller_id'] ?? $_SESSION['user']['id'] ?>"   />
      <input type="hidden"  name="item[track_status]" value="<?=$item['track_status'] ?? 'n/a' ?>"    />
    </div>

    <div class="form-group col-md-6 col-md-6">
      <label for="exampleInputEmail1">Piece Title</label>
      <input name="item[title]" value="<?=$item['title'] ?? '' ?>" type="text" class="form-control" id="exampleInput"  placeholder="Enter title">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Minimum Price £(GBP) </label>
      <input name="item[price_min]" value="<?=$item['price_min'] ?? '' ?>" type="number" step="0.01" min="0" class="form-control" id="exampleInputfname" aria-describedby="nameHelp" placeholder="Enter Minimum Price">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Maximum Price £(GBP) </label>
      <input name="item[price_max]" value="<?=$item['price_max'] ?? '' ?>" type="number" step="0.01" min="1" class="form-control" id="exampleInputfname" aria-describedby="nameHelp" placeholder="Enter Maximum Price">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Dimensions</label>
      <input name="item[dimensions]" value="<?=$item['dimensions'] ?? '' ?>" type="text" class="form-control" id="exampleInput" aria-describedby="nameHelp" placeholder="Enter Dimensions 1.5m x 1.5m">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Framed</label>
      <input name="item[framed]" value="<?=$item['framed'] ?? '' ?>" type="text" class="form-control" id="exampleInput" placeholder="Mttalic Frame">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Artist</label>
      <input name="item[artist]" value="<?=$item['artist'] ?? '' ?>" type="text" class="form-control" id="exampleInput" placeholder="Banksy">
    </div>
    <div class="form-group col-md-12">
      <label for="exampleInput">Description</label>
       <textarea name="item[description]" class="form-control" placeholder="Item description" id="floatingTextarea2" style="height: 100px"><?=$item['description'] ?? '' ?></textarea>
    </div>
    

    <div class=" col-12 text-center">
      <input type="submit" class="btn btn-primary  " value="Save"/>
    </div>
  </form>
</main>
