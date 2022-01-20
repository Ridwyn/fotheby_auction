<main class="container">
  <h4 class="text-center"> Current Item to Bid On </h4>
 <div class="text-center">
 <p id="timeLeft" class="text-center"></p>
 <p class="badge badge-dark">Current bid £<?=$minimumBidAmount?></p>
 </div>

 <!-- Check if item exist and return message  -->
 <?php
  if (!isset($item)) {
    echo '<h4 class="text-center">No current Item on auction now</h4>';
   return;
  }
 ?>
  <form action="" method="POST" class="p-3 my-3  row justify-content-center border rounded w-75 mx-auto">
    <div class="form-group col-md-12">
        <input type="text" name="minimumBidAmount" id ="minimumBidAmount" value="<?=$minimumBidAmount?>" hidden>
        <input type="text" name="auction_enddate" id ="auctionEnddate" value="<?=$item['auction_enddate']?>" hidden >
      <input type="hidden"  name="item[id]" value="<?=$item['id'] ?? '' ?>" />
      <input type="hidden"  name="bid[id]" value="<?=$bid['id'] ?? '' ?>" />
      <input type="hidden"  name="bid[bidder_id]" value="<?=$_SESSION['user']['id'] ?? '' ?>"   />
      <input type="hidden"  name="bid[item_id]" value="<?=$item['id'] ?? '' ?>"    />
      <input type="hidden"  name="bid[catalogue_id]" value="<?=$item['catalogue_id'] ?? '' ?>"    />
    </div>

    <div class="form-group col-md-6 col-md-6">
      <label for="exampleInputEmail1">Piece Title</label>
      <input disabled name="item[title]" value="<?=$item['title'] ?? '' ?>" type="text" class="form-control" id="exampleInput"  placeholder="Enter title">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Dimensions</label>
      <input disabled name="item[dimensions]" value="<?=$item['dimensions'] ?? '' ?>" type="text" class="form-control" id="exampleInput" aria-describedby="nameHelp" placeholder="Enter Dimensions 1.5m x 1.5m">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Framed</label>
      <input disabled name="item[framed]" value="<?=$item['framed'] ?? '' ?>" type="text" class="form-control" id="exampleInput" placeholder="Mttalic Frame">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Artist</label>
      <input disabled name="item[artist]" value="<?=$item['artist'] ?? '' ?>" type="text" class="form-control" id="exampleInput" placeholder="Banksy">
    </div>
    <div class="form-group col-md-12">
      <label for="exampleInput">Description</label>
       <textarea disabled name="item[description]" class="form-control" placeholder="Item description" id="floatingTextarea2" style="height: 100px"><?=$item['description'] ?? '' ?></textarea>
    </div>
    <?php
      $div='';
      if ($_SESSION['user']['usertype']=='client') {
        $div='<div class="form-group col-md-12">
          <label for="exampleInput">Enter Bid Amount</label>
          <input  name="bid[bid_amount]" type="number" step="0.01" id="bidAmount" onblur="checkLowBid()" class="form-control" placeholder="Item Bid Amount"  required/>
          <div id="lowBid" class="form-text"></div>
        </div>';
      }

      echo $div;

   
    
    ?>
    
    

    <div class=" col-12 text-center">
      <input type="submit" class="btn btn-primary  " value="bid"/>
    </div>
  </form>

<script>
    

    // // Get auction EndtTime
    var countDownDate= document.getElementById("auctionEnddate").value;
    var minimumBidAmount=document.getElementById("minimumBidAmount").value;
    
    var timeLeft=document.getElementById('timeLeft');

    function start(){
        countDownDate=Date.parse(countDownDate)/1000
        countdown();
    }


    function countdown(){
        var x = setInterval(function() {

       

        // Get today's date and time
        var now = Math.floor((new Date()).getTime() / 1000);

        // Find the timeOffset between now and the count down date
        var timeOffset = parseInt(countDownDate) - now;
            
        // Time calculations for days, hours, minutes and seconds
        var date = new Date(timeOffset);
        var days = Math.floor(date / 60 / 60 / 24);
        var hours = Math.floor(date / 60 / 60 % 24);
        var minutes = Math.floor(date / 60 % 60);
        var seconds = Math.floor(date % 60);
    
        timeLeft.innerHTML= "Time Left : "+ days + "d " + hours + "h "
         + minutes + "m " + seconds + "s " ;
         timeLeft.className='badge badge-success'
        // If the count down is finished, write some text
         if (timeOffset < 0) {
            clearInterval(x);
            timeLeft.innerHTML = "EXPIRED";
            timeLeft.className = 'badge badge-danger';
        }
        }, 1000);
    }



    document.addEventListener('DOMContentLoaded', start, false);

</script>
</main>
