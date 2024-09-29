// Get the login button element
const loginBtn = document.getElementById('loginBtn');

// Redirect to login.php when the login button is clicked
loginBtn.addEventListener('click', () => {
    console.log("login btn clicked");
    window.location.href = 'login.php';  // Redirect to login.php
});
