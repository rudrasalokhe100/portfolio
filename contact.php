<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email settings
    $to = "rudrasalokhe100@gmail.com"; // Replace with your email address
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $email_body = "<html><body>";
    $email_body .= "<h2>Contact Form Submission</h2>";
    $email_body .= "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Message:</strong><br>$message</p>";
    $email_body .= "</body></html>";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your message. It has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again.";
    }
}
?>

