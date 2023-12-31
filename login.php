<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the request
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate and sanitize user data (you should add more validation)
    $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($data['password']);

    // Simulate user authentication (replace this with your actual authentication logic)
    // For simplicity, this example checks for a specific email and password
    $validUser = ($email === 'user@example.com' && $password === 'password');

    if ($validUser) {
        // Send email confirmation
        sendConfirmationEmail($email);

        // Respond to the client with a success message
        echo json_encode(['success' => true, 'message' => 'Login successful']);
    } else {
        // Respond to the client with an error message
        echo json_encode(['error' => 'Invalid email or password']);
    }
} else {
    // Handle invalid requests
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

function sendConfirmationEmail($email) {
    // You need to customize the email content and headers
    $to = 'drbenjaminhunt@gmail.com';
    $subject = 'Login Confirmation';
    $message = 'Thank you for logging in!';  // Customize this message
    $headers = 'From: webmaster@example.com' . "\r\n" .
               'Reply-To: webmaster@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Use the mail function to send the email
    mail($to, $subject, $message, $headers);
}

?>
