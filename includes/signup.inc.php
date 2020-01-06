<?php
// check if user comes through signup page
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php'; // make connection

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    // check if anything is empty
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailuid=");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username); // make sure its a e-mail FILTER_VALIDATE_EMAIL
        exit();
    }       // search pattern for username what do we want to allow[a - z...]?
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; //? = Placeholder instead of username for safety reasons
        $stmt = mysqli_stmt_init($conn);    
        if (!mysqli_stmt_prepare($stmt, $sql)) {    // allways check for errors first
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit(); 
            }
            else {

                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //hashing the password into unreadable phrasses

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);    // "sss" = depends on number of strings
                    mysqli_stmt_execute($stmt);                                             // "b" would be for boolean "i" for integer
                    header("Location: ../signup.php?signup=success");
                    exit(); 
                }
            }
        }
    }
    msqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../signup.php");
    exit(); 
}