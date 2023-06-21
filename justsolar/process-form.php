<?php
// Retrieve form data
$name = $_POST['name'] ?? '';
$products = implode(", ", $_POST['products'] ?? []);
$phone = $_POST['phone'] ?? '';
$location = $_POST['location'] ?? '';
$message = $_POST['message'] ?? '';

// Email configuration
$to = 'info@justessentials.co.ke';  // Replace with your email address
$subject = 'New Form Submission';
$headers = "From: $name <$to>\r\n";
$headers .= "Reply-To: $to\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Email content
$body = "Name: $name\n";
$body .= "Products: $products\n";
$body .= "Phone: $phone\n";
$body .= "Location: $location\n";
$body .= "Message: $message\n";

// Send email
$mailSent = mail($to, $subject, $body, $headers);

// Check if the email was sent successfully
if ($mailSent) {
    echo '<script>alert("Thank you for your message! We will get back to you soon.");</script>';
} else {
    echo '<script>alert("Oops! An error occurred while sending the message. Please try again.");</script>';
}

// Redirect to the home page
echo '<script>window.location.href = "index.html";</script>';
?>
