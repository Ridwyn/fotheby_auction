<main class="container">


  <form action="" method="POST" class="p-3 my-3  row justify-content-center border rounded w-75 mx-auto">
    <div class="form-group col-md-12">
      <input type="hidden"  name="client[id]" value="<?=$client['id'] ?? '' ?>" />
      <input type="hidden"  name="client[usertype]" value="client"  />
    </div>

    <div class="form-group col-md-6 col-md-6">
      <label for="exampleInputEmail1">Email address</label>
      <input name="client[email]" value="<?=$client['email'] ?? '' ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInputfname">FirstName</label>
      <input name="client[firstname]" value="<?=$client['firstname'] ?? '' ?>" type="text" class="form-control" id="exampleInputfname" aria-describedby="nameHelp" placeholder="Enter firstname">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInputLastname">Surname</label>
      <input name="client[surname]" value="<?=$client['surname'] ?? '' ?>" type="text" class="form-control" id="exampleInputSurname" aria-describedby="nameHelp" placeholder="Enter lastname">
    </div>
    <?=(isset($client['password'])) ?
    ''
    :  "<div class='form-group col-md-6'>
      <label for='exampleInputPassword'>Password</label>
      <input name='client[password]' value='{$client['password']}'  class='form-control' id='exampleInputPassword1' placeholder='Password'>
    </div> "; ?>




    <div class="form-group col-md-6">
      <label for="exampleInput">Client Status</label> <br>
      <select name="client[status]"  class="form-select" aria-label="select example">
        <?php
        $options=array("buyer", "seller", "both");
          foreach ($options as $option ) {

              if(strval($option)== strval($client['status'])){
              echo'<option value="'.$option.'" selected class="font-weight-bold">'.$option.' (Selected)</option>';
              }
              if(strval($option) != strval($client['status'])){
                echo '<option value="'.$option.'"  class="">'.$option.'</option>';
              }

            }
        ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Buyer Approved Status</label><br>
      <select name="client[buyer_approved_status]"  class="form-select " aria-label="select example">
        <?php
        $options=array("yes", "no");
          foreach ($options as $option ) {

              if(strval($option)== strval($client['buyer_approved_status'])){
              echo'<option value="'.$option.'" selected class="font-weight-bold">'.$option.' (Selected)</option>';
              }
              if(strval($option) != strval($client['buyer_approved_status'])){
                echo '<option value="'.$option.'"  class="">'.$option.'</option>';
              }

            }
        ?>
      </select>
     </div>

    <div class="form-group col-md-6">
      <label for="exampleInputTelephone">Telephone</label><br>
      <input name="client[telephone]" value="<?=$client['telephone'] ?? '' ?>" type="number"  class="form-control" id="exampleInputSurname" aria-describedby="nameHelp" placeholder="Enter Telephone">
    </div>

    <div class="form-group col-md-6">
      <label for="exampleInput">Client Address</label>
      <input name="client[address]" value="<?=$client['address'] ?? '' ?>" type="text" class="form-control" id="exampleInput" aria-describedby="nameHelp" placeholder="Enter Address">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleInput">Bank Account Number</label>
      <input name="client[bank_account_number]" value="<?=$client['bank_account_number'] ?? '' ?>" type="text" class="form-control" id="exampleInput" aria-describedby="nameHelp" placeholder="Enter Acccount Nnumber">
    </div>

    <div class="form-group col-md-6">
      <label for="exampleInput">Bank Sort Code</label>
      <input name="client[bank_sort_code]" value="<?=$client['bank_sort_code'] ?? '' ?>" type="text" class="form-control" id="exampleInput" aria-describedby="nameHelp" placeholder="Enter Sort code ">
    </div>

    <div class=" col-md-12 text-center">
      <input type="submit" class="btn btn-primary  " value="Save"/>
    </div>
  </form>


</main>
