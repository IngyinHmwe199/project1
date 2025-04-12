<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = mysqli_connect("localhost", "root", "", "ai_solutions");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];



    // Step 1: Validate Email & Password
    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Step 2: Generate Token and Save
            $token = bin2hex(random_bytes(32));
            

            // Store the raw token directly
            $stmt = $conn->prepare("UPDATE admin_users SET token=? WHERE email=?");
            $stmt->bind_param("ss", $token, $email);
            $stmt->execute();


            // Step 3: Send Verification Email

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.sendgrid.net'; // Replace with your SMTP server
                $mail->SMTPAuth = true;
                // $mail->Username = 'apikey';
                // $mail->Password = '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';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('ghmwe19@gmail.com', 'Admin Verification');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Admin Login Verification';

                $verificationLink = "http://localhost/AssgPrj/Admin.php?email=" . urlencode($email) . "&token=" . urlencode($token);
                $mail->Body = "Click to verify your login: <a href='$verificationLink'>$verificationLink</a>";

                $mail->send();
                echo "email_sent"; // AJAX will handle this response
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        } else {
            echo "Wrong password!";
        }
    } else {
        echo "Email not registered!";
    }
}

// Step 4: Handle Email Verification
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE email = ? AND token = ?");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        
         // Clear the token (optional, for security)
         $stmt = $conn->prepare("UPDATE admin_users SET token = NULL WHERE email = ?");
         $stmt->bind_param("s", $email);
         $stmt->execute();
 
         $_SESSION['verified_email'] = $email; // Store verified email in session
         // Redirect to Admin page
         header("Location: Admin.php");
         exit();
    } else {
        echo "Invalid or expired verification link.";
    }
}
