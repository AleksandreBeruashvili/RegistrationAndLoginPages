document.getElementById('username').addEventListener('keyup', function() {
    var username = document.getElementById('username').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'check_username.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        document.getElementById('username-availability-status').innerText = this.responseText;
    };
    xhr.send('username=' + username);
});

document.getElementById('registrationForm').addEventListener('submit', function(e) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        e.preventDefault();
    }
});
