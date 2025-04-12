<?php
$conn = new mysqli("localhost", "root", "", "ai_solutions");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = isset($_GET['query']) ? trim($_GET['query']) : "";
$filter = isset($_GET['filter']) ? $_GET['filter'] : "all";

$sql = "SELECT id, name, email, phone, company FROM inquiries WHERE 1";

if (!empty($query)) {
    if ($filter == "date") {
        $sql .= " AND created_date LIKE '%$query%'";
    } elseif ($filter == "country") {
        $sql .= " AND country LIKE '%$query%'";
    } elseif ($filter == "job_title") {
        $sql .= " AND job_title LIKE '%$query%'";
    } else {
        $sql .= " AND (name LIKE '%$query%' OR email LIKE '%$query%' OR phone LIKE '%$query%' OR company LIKE '%$query%')";
    }
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="inquiry-item w3-card-4 w3-margin-bottom" onclick="loadInquiry(' . $row['id'] . ')" style="cursor: pointer;">
                <header class="w3-container w3-blue">
                    <h4>' . htmlspecialchars($row['name']) . '</h4>
                </header>
                <div class="w3-container">
                    <p><strong>Email:</strong> ' . htmlspecialchars($row['email']) . '</p>
                    <p><strong>Phone:</strong> ' . htmlspecialchars($row['phone']) . '</p>
                    <p><strong>Company:</strong> ' . htmlspecialchars($row['company']) . '</p>
                </div>
              </div>';
    }
} else {
    echo "<p>No inquiries found.</p>";
}

$conn->close();
?>
