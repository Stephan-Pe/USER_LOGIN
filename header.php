<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Fake-Book</title>
</head>
<body>
    <header>

        <nav>
            <a href="">
                <img src="boeckli.png" alt="logo" id="logo">
            </a>
            <ul>
            <?php
                    if(isset($_SESSION['userId'])) {
                        echo '<li><a href="index.php">Home</a></li>
                            <li><a href="member.php">Inside</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact</a></li> ';
                    }
                    else {
                        echo '<li><a href="index.php">Fakebook the Place to be!</a></li>';
                    }
                ?>
           <!--     <li><a href="index.php">Home</a></li>
                <li><a href="">Portfolio</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">Kontakt</a></li> -->
            </ul>
            <div class="form">
                <?php
                    if(isset($_SESSION['userId'])) {
                        echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="logout-submit">Logout</button>
                        </form>';
                    }
                    else {
                        echo '<form action="includes/login.inc.php" method="POST">
                        <input type="text" name="mailuid" placeholder="Username/E-mail..">
                        <input type="password" name="pwd" placeholder="Password..">
                        <button type="submit" name="login-submit">Login</button>
                        </form>
                        <a href="signup.php">Signup</a>';
                    }
                ?>
                
                
            </div>
        </nav>

    </header>