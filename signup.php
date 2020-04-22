<?php
    require "header.php";
?>
    <main>
        <div class="answer">
            <h1>Sign up</h1>
            <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class="errorMessage">Bitte alle Felder ausfüllen!</p>';
                    }
                    else if ($_GET['error'] == "invalidmail") {
                            echo '<p class="errorMessage">Keine gültige Mail Adresse!</p>'; 
                    }
                    else if ($_GET['error'] == "passwordcheck") {
                            echo '<p class="errorMessage">Passwörter nicht identisch!</p>'; 
                    }
                    else if ($_GET['error'] == "usertaken") {
                            echo '<p class="errorMessage">Username vergeben!</p>'; 
                    }
                }

            ?>
            <form class="form-signup" action="includes/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
            <!-- Forgot Password? send to URL-->
            <?php
                if (isset($_GET["newpwd"])) {
                    if ($_GET["newpwd"] == "passwordupdated") {
                        echo '<p class="signupsuccess"> Ihr Passwort wurde erfolgreich zurückgesetzt!</p>';
                    }
                }
            ?>
            
            <a href="reset-password.php">Passwort vergessen?</a>
        </div>
    </main>

<?php
    require "footer.php";
?>