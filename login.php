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
        // Respond to the client (you may want to customize this based on your needs)
        echo json_encode(['message' => 'Login successful']);
    } else {
        // Respond to the client with an error message (you may want to customize this based on your needs)
        echo json_encode(['error' => 'Invalid email or password']);
    }
} else {
    // Handle invalid requests
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>
