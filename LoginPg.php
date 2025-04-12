<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Solutions</title>
    <style>
        body {
            background: url('images/aiBackground.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 350px;
        }
        .login-form:hover {
            background: black;
            color: white;
        }
        input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        button {
            width: 50%;
            padding: 10px;
            background: white;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        #error-message {
            color: red;
            display: none;
        }
       
    </style>
</head>
<body>
    <form class="login-form" onsubmit="return validateForm(event)">
        <h2>Admin Login</h2>
        <input type="email" id="email" placeholder="Enter your email" required>
        <input type="password" id="password" placeholder="Enter your password" required>
        
        <center>
         <!-- Google reCAPTCHA -->
         <div class="g-recaptcha" data-sitekey="6LfIlP4qAAAAAJne4mX9CXphGMC5UGAYdDdID4jB"></div>
         </center>        
         <hr>
        <button type="submit">Login</button>
        <p id="error-message">Invalid email format</p>
    </form>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function validateForm(event) {
            event.preventDefault(); // Prevent form from submitting immediately
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            let recaptchaResponse = grecaptcha.getResponse(); // Get reCAPTCHA response

            if (!emailPattern.test(email)) {
                document.getElementById("error-message").style.display = "block";
                return false;
            }

             // Check if reCAPTCHA is verified
             if (recaptchaResponse === "") {
                alert("Please verify the reCAPTCHA before logging in.");
                return false;
            }

            // Send credentials to PHP for validation
            fetch('login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `email=${email}&password=${password}&g-recaptcha-response=${recaptchaResponse}`
            })
            .then(response => response.text())
            .then(data => {
                if (data === "email_sent") {
                    alert("Verification email sent. Please check your inbox.");
                } else {
                    alert(data);
                }
            })
            .catch(error => console.error('Error:', error));

            return false;
        }
    </script>
</body>
</html>
