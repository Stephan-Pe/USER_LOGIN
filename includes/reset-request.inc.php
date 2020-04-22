<?php

if (isset($_POST["reset-request-submit"])) {

    // create Token Randombytes with bin2Hex
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "https://www.myDomain/forgottenpwd/create-new-password.php?" . $selector . "&validator=" . bin2hex($token);

    // expiry date for token
    $expires = date("U") + 1800;


    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    // delete existing token first than execute Statement
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    // Insert Token into database

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'Setzen Sie Ihr Passwort zurück';

    $message = '<p>Wir erhielten für Ihren Account eine Anfrage zum zurücksetzen des Passwortes. Sollte diese Anfrage
        nicht von Ihnen sein können Sie dieses E-Mail ignorieren.</p>';

    $message .= '<p>Hier ist Ihr Link zum zurücksetzen des Passwortes: </br>';
    $message .= '<a href="' .$url . '">' .$url . '</a></p>';

    $headers = "Von: myDomain <myMailadress@something.com>\r\n";
    $headers .= "Antwort an: myMailadress@something.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $headers);

    header("Location: ../reset-password.php?reset-success");

} else {
    header("Location: ../index.php");
}