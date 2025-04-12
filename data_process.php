<?php
$conn = mysqli_connect("localhost", "root", "", "ai_solutions");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$country = $_POST['country'];
$job_title = $_POST['job-title'];
$job_details = $_POST['job-details'];
$status = 'Pending'; // Default status
$created_date = date("Y-m-d"); // Store only the date

// Prepare SQL statement
$sql = "INSERT INTO inquiries (name, email, phone, company, country, job_title, job_details, status, created_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $name, $email, $phone, $company, $country, $job_title, $job_details, $status, $created_date);

// Execute query
if ($stmt->execute()) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Inquiry Submitted!',
                    html: '<b>Name:</b> $name<br><b>Email:</b> $email<br><b>Phone:</b> $phone',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href='LandingPg.php';
                });
            });
          </script>";
}
$sql = "SELECT name, email, phone, company, country, job_title, job_details FROM inquiries ORDER BY id DESC";
$result = $conn->query($sql);
// Close connections
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-Us2</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>
