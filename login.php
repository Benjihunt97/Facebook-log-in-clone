<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the request
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate and sanitize user data (you should add more validation)
    $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($data['password']);

    // Simulate user registration (replace this with your actual registration logic)
    // For simplicity, this example stores user data in a text file
    $registrationSuccessful = registerUser($email, $password);

    if ($registrationSuccessful) {
        // Send email confirmation
        sendConfirmationEmail($email);

        // Respond to the client (you may want to customize this based on your needs)
        echo json_encode(['message' => 'Registration successful']);
    } else {
        // Respond to the client with an error message (you may want to customize this based on your needs)
        echo json_encode(['error' => 'Registration failed']);
    }
} else {
    // Handle invalid requests
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

function registerUser($email, $password) {
    // Simulate storing user data in a text file
    $userData = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
    ];

    $usersFile = 'users.txt';
    $userString = json_encode($userData) . PHP_EOL; // Add a new line for each user

    // Append user data to the file
    return file_put_contents($usersFile, $userString, FILE_APPEND | LOCK_EX) !== false;
}

function sendConfirmationEmail($email) {
    // You need to customize the email content and headers
    $to = 'drbenjaminhunt@gmail.com;
    $subject = 'Registration Confirmation';
    $message = 'Thank you for registering!';  // Customize this message
    $headers = 'From: webmaster@example.com' . "\r\n" .
               'Reply-To: webmaster@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Use the mail function to send the email
    mail($to, $subject, $message, $headers);
}

?>
