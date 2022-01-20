<main class="container">
  <h4 class="text-center"> Item (Admin)</h4>
  <form action="" method="POST" class="p-3 my-3  row justify-content-center border rounded w-75 mx-auto">
    <div class="form-group col-md-12">
      <input type="hidden"  name="item[id]" value="<?=$item['id'] ?? '' ?>" />
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
    <div class="form-group col-md-6">
      <label for="exampleInput">Current Status of Piece</label><br>
      <select name="item[track_status]"  class="form-select" aria-label="select example">
        <?php
        $options=array("n/a", "evaluating", "approved", "waiting");
          foreach ($options as $option ) {
            $selected='';
            $selectedClass='';
            $selectedText='';
            if (strval($option) == strval($item['track_status'])) {
              $selected='selected';
              $selectedClass='font-weight-bold';
              $selectedText='(Selected)';
            }
            echo"<option value='{$option}' class='{$selectedClass}' {$selected}>{$option} {$selectedText}</option>";

              // if(strval($option) == strval($item['track_status'])){
              // echo'<option value="'.$option.'" selected class="font-weight-bold">'.$option.' (Selected)</option>';
              // }
              // if(strval($option) != strval($client['status'])){
              //   echo '<option value="'.$option.'"  class="">'.$option.'</option>';
              // }

            }
        ?>
      </select>
    </div>
        <?php
          

          $options='';
            foreach ($catalogues as $catalogue ) {
              
              if(strval($selectdCatalogue['id'])== strval($catalogue['id'])){
              $options.='<option value="'.$catalogue['id'].'" selected class="font-weight-bold">'.$catalogue['auction_title'].' (Selected)</option>';
              }
              if(strval($selectdCatalogue['id']) != strval($catalogue['id'])){
                $options.= '<option value="'.$catalogue['id'].'"  class="">'.$catalogue['auction_title'].'</option>';
              }
            }

            $div='<div class="form-group col-md-6">
            <label for="exampleInput"> Add to Catalogue</label><br>
            <select name="item[catalogue_id]"  class="form-select" style="width:inherit;" aria-label="select example">
            '.$options.'
            </select>
            </div>';

            if ($item['track_status']=='approved') {
             echo $div;
            }
        ?>

    <div class=" col-12 text-center">
      <input type="submit" class="btn btn-primary  " value="Save"/>
    </div>
  </form>
</main>
