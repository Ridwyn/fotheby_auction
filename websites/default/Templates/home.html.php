
<main>

<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</a></p>

<h2>Select the type of job you are looking for:</h2>

<ul class="listing">

<?php
    foreach ($items as $key => $item) {
        echo '<li>';
        echo '<div class="details">';
        echo '<h2>' . $item['name'] . '</h2>';
        echo '<h3>' . $item['description'] . '</h3>';
        echo '</div>';
        echo '</li>';
    }
?>



</ul>

</main>
