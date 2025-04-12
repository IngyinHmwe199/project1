<?php
$conn = new mysqli("localhost", "root", "", "ai_solutions");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Inquiry Details
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Securely get the inquiry ID
    $stmt = $conn->prepare("SELECT name, email, phone, company, country, job_title, job_details, status, created_date FROM inquiries WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc()); // Convert data to JSON
    } else {
        echo json_encode(["error" => "Inquiry not found"]);
    }
}
// Handle Edit Request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === "edit") {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $country = $_POST['country'];
    $job_title = $_POST['job_title'];
    $job_details = $_POST['job_details'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE inquiries SET name=?, email=?, phone=?, company=?, country=?, job_title=?, job_details=?, status=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $name, $email, $phone, $company, $country, $job_title, $job_details, $status, $id);


    if ($stmt->execute()) {
        echo json_encode(["message" => "Inquiry updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update inquiry"]);
    }
    exit();
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data['action'] === "delete") {
        $id = intval($data['id']);

        $stmt = $conn->prepare("DELETE FROM inquiries WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Inquiry deleted successfully"]);
        } else {
            echo json_encode(["error" => "Failed to delete inquiry"]);
        }
        exit();
    }
}

$conn->close();
