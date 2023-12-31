document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Collect user input
        const email = document.getElementsByName('email')[0].value;
        const password = document.getElementsByName('password')[0].value;

        // Simple client-side validation
        if (email.trim() === '' || password.trim() === '') {
            alert('Please enter both email and password.');
            return;
        }

        // Send user data to the server for validation and processing
        loginUser(email, password);
    });

    function loginUser(email, password) {
        // Use AJAX or fetch API to send data to the server
        // For simplicity, this example does not include the actual AJAX code
        // You may want to use a library like Axios or the native fetch API
        fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: email,
                password: password,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            console.log(data);
            // You may want to redirect the user or perform other actions based on the response
        })
        .catch(error => console.error('Error:', error));
    }
});
