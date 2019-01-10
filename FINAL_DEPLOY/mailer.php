<?php

    // Get the form fields, removes html tags and whitespace.
    $name = filter_var(trim($_POST["name"]),FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = isset($_POST["phone"]) ? filter_var(trim($_POST["phone"]),FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $vyroba = filter_var(trim($_POST["vyroba"]),FILTER_SANITIZE_SPECIAL_CHARS);

    // Check the data.
    if (empty($name) || empty($message) || empty($email)) {
        header("Location: /?success=-1#form");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "<erik.mulik@gmail.com>";

    // Set the email subject.
    $subject = "New contact from $name";

    // Build the email content.
    $email_content = "Meno: ".$name."<br>";
    $email_content .= "Email: ".$email."<br>";
    $email_content .= "Telefon: ".$phone."<br>";
    $email_content .= "Vyroba: ".$vyroba."<br>";
    $email_content .= "Sprava:<br>".$message;

    // Build the email headers.
    $email_headers  = 'MIME-Version: 1.0' . "\r\n";
    $email_headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $email_headers .= "From: $name <noreply@tomiinterier.sk>";

    // Send the email.
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Redirect to the index.html page with success code
        header("Location: /?success=1#form");
    } else {
        header("Location: /?success=-1#form");
    }
    exit;
