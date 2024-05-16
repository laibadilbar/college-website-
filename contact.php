<?php

// Error reporting ko enable karein
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form fields ka data retrieve karein
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Apni email ID aur subject set karein
    $email_from = 'laibadilbar628@gmail.com';
    $email_subject = "New Form Submission: $subject";
    
    // Email body tayar karein
    $email_body = "Name: $name\n".
                  "Email: $visitor_email\n".
                  "Message:\n$message";
    
    // Apne email address jahan par form ka data bhejna hai
    $to = 'zashanrana000710@gmail.com';
    
    // Headers tayar karein
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";
    
    // Email bhejein
    $success = mail($to, $email_subject, $email_body, $headers);
    
    if ($success) {
        echo "Thank you for contacting us!";
    } else {
        echo "Oops! An error occurred while sending the email.";
    }
} else {
    // Agar direct URL se access kiya gaya hai, toh redirect karein
    header("Location: contact.html");
    exit();
}
?>
