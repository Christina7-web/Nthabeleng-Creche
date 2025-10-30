<?php
// Check if the form was submitted using the POST method
If ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Sanitize and retrieve the form data
    // htmlspecialchars() helps prevent Cross-Site Scripting (XSS) attacks
    // trim() removes extra whitespace from the beginning and end
    
    $name = htmlspecialchars(trim($_POST['name'] ?? ‘’));
    $email = htmlspecialchars(trim($_POST['email'] ?? ‘’));
    $message = htmlspecialchars(trim($_POST['message'] ?? ‘’));  // <--

    // Basic validation to check if the required fields are not empty
    If (empty($name) || empty($email) || empty($message)) {
        // Handle error: one or more required fields are empty
        echo "<h2>Error:All fields are required. Please go back and fill out the form.</h2>";
    } else {
        
        // 2. Process the data (e.g., send an email, save to database)
        
        // --- For a real contact form, you would use PHP’s mail() function here ---
        // Example of sending an email:
        /*
        $to = your_email@example.com;
        $subject = “New Contact Form Submission from $name”;
        $headers = “From: $email” . “\r\n” . “Reply-To: $email”;
        $body = “Name: $name\nEmail: $email\n\nMessage:\n$message”;
        
        If (mail($to, $subject, $body, $headers)) {
            Echo “<h2>Thank You!</h2>”;
            Echo “<p>Your message has been successfully sent.</p>”;
        } else {
            Echo “<h2>Error sending email.</h2>”;
        }
        */
        // --- End of mail example ---

        // 3. Simple Display of Submitted Data (for testing/demonstration)
        echo "<h2>Message Received!</h2>";
        echo "<p>Thank you for contacting us. Here is the data we received:</p>";
        echo "<ul>";
        echo "<li><strong>Name:</strong> $name</li>";
        echo "<li><strong>Email:</strong> $email</li>";
        echo "<li><strong>Message:</strong> " . nl2br($message) . "</li>"; // nl2br converts newlines to <br>
        echo "</ul>";
        
        echo "<p><a href=\"index.html\">Go back to the homepage</a></p>";
    }

} else {
    // If the user tries to access this script directly without submitting the form
    echo "<h2>Access Denied</h2>";
    echo "<p>Please submit the contact form.</p>";
}
?>