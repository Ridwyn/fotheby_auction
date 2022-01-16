<main class="sidebar">
<section class="left">
    <?php require 'adminpanel.html.php'?>
</section>


    <section class="right">
        <form action="" method="POST">

        <input type="hidden" name="category[id]" value="<?= $category['id']??'' ?>" />
        <label>Name</label>
        <input type="text" name="category[name]" value="<?= $category['name'] ?? ''; ?>" />


        <input type="submit" name="submit" value="Save Category" />

        </form>
    </section>
</main>