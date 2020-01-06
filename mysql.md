# mysql init database

- create database 
- go to SQL

```mysql
CREATE TABLE users (
idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
idUsers TINYTEXT NOT NULL,
emailUsers TINYTEXT NOT NULL,
pwdUsers LONGTEXT NOT NULL
);
```
- sorry no syntax highlights on MYSQL

## needs

- connection script dbh.inc.php inc = *folder/includes*
- signup script, *bringing dates into database with HTML form*
```HTML
<form class="form-signup" action="includes/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
```
- login script, *access for registrated users*
```PHP
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
```
- logout script, *ending of SESSION*
- verify script, *ensure on each member site the user is logged in*




