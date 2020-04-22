<?php
    require "header.php";
?>
    <main>
        

    <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($selector) || empty($validator)) {
            echo "Wir konnten Ihre Anfrage nicht bearbeiten!";
        } else {
           if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>
            <form action="includes/reset-password.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">
                <input type="password" name="pwd" placeholder="Neues Passwort hier...">
                <input type="password" name="pwd-repeat" placeholder="Passwort wiederholen">
                <button type="submit" name="reset-password-submit">Passwort zurücksetzen</button>
            </form>

            <?php
           } 
        }
    ?>
      
    </main>

<?php
    require "footer.php";
?>