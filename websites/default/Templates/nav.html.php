
<?php

$user=null;
$userDashLink='';
if (isset($_SESSION['user'])) {
 $user=$_SESSION['user'];
  
  if ($_SESSION['user']['usertype']=='admin') {
    $userDashLink='/admin/dashboard';
  }
  if ($_SESSION['user']['usertype']=='client') {
    $userDashLink='/dashboard';
  }
}


?>


<nav class="navbar navbar-expand-lg navbar-expand-MD primary-bg-color">
  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

    <i class="fas fa-chevron-down"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav row">
      <li class="nav-item col">
        <a class="nav-link  text-white" href="/home"    aria-expanded="false">
          Home
        </a>
      <li class="nav-item col">
        <a class="nav-link text-white" href="/about">About Us</a>
      </li>
      
      <?php
        if (isset($user)) {
         echo '
          <li class="nav-item col">
          <a class="nav-link text-white" href='. $userDashLink .'><i class="fas fa-portrait" style="font-size: 1.5rem;"></i> '.$user['firstname'].'</a>
          </li>
            <li class="nav-item col">
            <a class="nav-link text-white" href="/logout">Logout</a>
            </li>';
        }
        if (!isset($user)) {
          echo ' <li class="nav-item col">
          <a class="nav-link text-white" href="/login">Login</a>
          </li>';
        }
      ?>
     
    </ul>
  </div>
</nav>
