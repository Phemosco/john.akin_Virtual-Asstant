<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Set the recipient email address
    $to = "femi.john.akinwunmi@gmail.com"; // 
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Create the email subject and message body
    $email_subject = "New Message: $subject";
    $email_body = "You have received a new message from the user $name.\n".
                  "Here are the details:\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message:\n$message\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Success
        echo "Your message has been sent successfully!";
    } else {
        // Failure
        echo "There was a problem sending your message. Please try again.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
