<main class="sidebar">

<section class="left">
    <?php require 'adminpanel.html.php'?>
</section>
<section class="right">

<h2>Categories</h2>

			<a class="new" href="/category/edit">Add new category</a>
<table>
	<thead>
	<tr>
	<th>Name</th>
	<th style="width: 5%">&nbsp;</th>
	<th style="width: 5%">&nbsp;</th>
	</tr>
    </thead>

    <tbody>
    
        <?php
            	foreach ($categories as $category) {
                    echo '<tr>';
                    echo '<td>' . $category['name'] . '</td>';
                    echo '<td><a style="float: right" href="/category/edit?id=' . $category['id'] . '">Edit</a></td>';
                    echo '<td><form method="post" action="/category/delete">
                    <input type="hidden" name="category[id]" value="' . $category['id'] . '" />
                    <input type="submit" name="submit" value="Delete" />
                    </form></td>';
                    echo '</tr>';
                }
        ?>
    </tbody>
</table>

</section>
</main>