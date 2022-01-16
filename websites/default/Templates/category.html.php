
<main class="sidebar">



<section class="left">
		<ul>
            <?php
            foreach ($categories as $key => $category) {
            echo ' <li><a href="category?id='.$category['id'].'">'.$category['name'].'</a></li>';
            }    
            ?>
        </ul>
        
        <form action="" method="GET" >
            <label for='filter'>Filter By Location</label></br>
            <select name="location" id="filter">
                <?php
                    foreach ($locations as $key => $location) {
                    echo'<option value="'.$location.'">'.$location.'</option>';
                    }
                ?>
        </select>
        <input type="submit" name="submit" value="OK" style=" margin-left: 0px; "/>
        </form>
	</section>

	<section class="right">

    <h1>
        <?php
        $a=isset($_GET['location']) ? 'Jobs in '.$_GET['location'].'': $categoryName.=' Jobs';
        echo $a;

        
        ?>
    
    </h1>

   

	<ul class="listing">

    <?php
        foreach ($jobs as $key => $job) {
            echo '<li>';
            echo '<div class="details">';
            echo '<h2>' . $job['title'] . '</h2>';
            echo '<h3>' . $job['salary'] . '</h3>';
            echo '<p>' . nl2br($job['description']) . '</p>';
            echo '<a class="more" href="/apply?id=' . $job['id'] . '">Apply for this job</a>';
            echo '</div>';
            echo '</li>';
        }
    ?>



</ul>

</section>

</main>


<script>



</script>