<?php
    require "header.php";
?>
    <main>
        <div class="answer">
            <h1>Sign up</h1>
            <form class="form-signup" action="includes/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </div>
    </main>

<?php
    require "footer.php";
?>