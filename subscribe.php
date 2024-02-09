<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["firstname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    
    // Specify your email address
    $recipient = "tpaisie91@gmail.com";
    $subject = "New Subscription from $name";
    $email_content = "Name: $name\nEmail: $email\n";

    // Send the email
    if(mail($recipient, $subject, $email_content)) {
        echo "<script>alert('Thank you for subscribing!');window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Subscription failed. Please try again.');history.back();</script>";
    }
} else {
    // Not a POST request, redirect to the homepage/form
    header("Location: index.html");
}
?>
