<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Set recipient email address
    $to = 'info@rentpick.co.uk';

    // Set subject
    $subject = 'New Contact Form Submission';

    // Compose message
    $messageBody = "Name: $name\n";
    $messageBody .= "Email: $email\n";
    $messageBody .= "Phone: $phone\n\n";
    $messageBody .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Attempt to send the email
    if (mail($to, $subject, $messageBody, $headers)) {
        // If successful, set success message
        echo json_encode(array('status' => 'success', 'message' => 'Your message has been sent. Thank you!'));
    } else {
        // If unsuccessful, set error message
        echo json_encode(array('status' => 'error', 'message' => 'Error sending message. Please try again later.'));
    }
} else {
    // If not a POST request, redirect or handle accordingly
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
