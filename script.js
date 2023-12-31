document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Collect user input
        const email = document.getElementsByName('email')[0].value;
        const password = document.getElementsByName('password')[0].value;

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
        .then(response => response.text())
        .then(data => {
            // Handle the response from the server
            try {
                const parsedData = JSON.parse(data);
                console.log(parsedData);
                // Process the parsed data here
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
