<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate and sanitize user input
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    $to = 'tolentinojanalexander2k@gmail.com';
    $subject = 'Contact Form Submission: ' . $subject;
    $message = 'Name: ' . $name . "\r\n" . 'Email: ' . $email . "\r\n\r\n" . 'Message: ' . $message;
    $headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)){
        echo '<div class="sent-message">Your message has been sent. Thank you!</div>';
    } else {
        echo '<div class="error-message">Something went wrong. Please try again.</div>';
    }
}
?>
