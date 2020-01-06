<?php
    require "header.php";
?>
    <main>
        <div class="answer">
            <?php
                // Log into index page
                if(isset($_SESSION['userId'])) {
                    echo '<h2>You are logged in!</h2></br>
                    <nav><a href="member.php">Memberbereich!</a></nav>';
                }
                else {
                    echo '<h2>You are logged out!</h2>';
                }
            ?>
        </div>
    </main>

<?php
    require "footer.php";
?>