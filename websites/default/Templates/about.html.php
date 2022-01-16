

<main class="container ">

    <section >
        <h2>About us</h2>
        <h5><?=$msg??''?></h5>
        <form action="" method="POST">
            <label>Name</label>
            <input type="text" name="enquiry[name]"  value="<?=$enquiry['name'] ?? ''?>"/>

            <label>E-mail </label>
            <input type="text" name="enquiry[email]"  value="<?=$enquiry['email'] ?? ''?>"/>

            <label>Telephone </label>
            <input type="text" name="enquiry[telephone]"  value="<?=$enquiry['telephone'] ?? ''?>"/>

            <label>Message</label>
            <textarea name="enquiry[message]" value="<?=$enquiry['message'] ?? ''?>"></textarea>


            <input type="submit" name="submit" value="Submit" />
        </form>
    </section>
</main>
