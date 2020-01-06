<?php
    require "header.php";
?>
    <main class="member">
        <div class="answer">
        <?php
            if(!isset($_SESSION['userId'])) {
                die('Bitte zuerst <a href="login.php">einloggen</a>');
            }
            
            //Abfrage der Nutzer ID vom Login
            $userid = $_SESSION['userId'];
            $username =  $_SESSION['userUid'];
            
            echo "<h2>Hallo  </h2>"."<h2>".$username ."</h2>";
        ?>
        </div>
    </main>

<?php
    require "footer.php";
?>