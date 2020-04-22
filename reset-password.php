<?php
    require "header.php";
?>
    <main>
        <h1>Passwort zurücksetzen</h1>
        <p>Wir senden Ihnen eine E-Mail mit instruktionen um Ihr Passwort zurückzusetzen</p>
        <form action="includes/reset-request.inc.php" method="post">
        <input type="text" name="email" placeholder="Hier Ihre E-Mail Adresse...">
        <button type="submit" name="reset-request-submit">Neues Passwort anfordern</button>
    </form>
    <?php
    if (isset($_GET["reset"])) {
        if ($_GET["reset"] == "success") {
            echo '<p class="signupsuccess">Kontrolieren Sie Ihre E_Mail</p>';
        }
    }
    ?>
    </main>

<?php
    require "footer.php";
?>