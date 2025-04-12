<?php
session_start(); // Start session

if (isset($_GET['email'])) {
    $email = $_GET['email']; // Retrieve email from URL
    $_SESSION['verified_email'] = $email; // Store it in session for later use
} else {
    header("Location: LoginPg.php"); // Redirect if not verified
    exit();
}


$verified_email = htmlspecialchars($_SESSION['verified_email']); // Safe output



$conn = mysqli_connect("localhost", "root", "", "ai_solutions");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Fetch inquiries
$sql = "SELECT id, name, email, phone, company FROM inquiries ORDER BY id DESC";
$result = $conn->query($sql);

// Count total inquiries
$total_query = "SELECT COUNT(*) AS total FROM inquiries";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_inquiries = $total_row['total'];

// Fetch inquiries where status is "In Progress"
$sql2 = "SELECT id, name, email, phone, company FROM inquiries WHERE status = 'Pending'";
$InProgressResult = $conn->query($sql2);

// Store results in an array
$inquiries = [];
if ($InProgressResult->num_rows > 0) {
    while ($row = $InProgressResult->fetch_assoc()) {
        $inquiries[] = $row;
    }
}

// Fetch inquiries where status is "Resolved"
$sql3 = "SELECT id, name, email, phone, company FROM inquiries WHERE status = 'Resolved'";
$ResolvedResult = $conn->query($sql3);

// Store results in an array
$resolved = [];
if ($ResolvedResult->num_rows > 0) {
    while ($row = $ResolvedResult->fetch_assoc()) {
        $resolved[] = $row;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Solutions</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: serif;
            color: #001F3F;
        }

        .search-container,
        .news-container {
            display: none;
            padding: 15px;
            text-align: center;

        }

        .search-container input {
            padding: 10px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .inquiry-list,
        .news-list {
            display: none;
            /* padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 10px; */
        }

        .inquiry-item,
        .news-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            margin: 30px;
        }

        #main-content {
            margin-left: 300px;
            /* Push content right */
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .w3-sidebar {
                width: 300px;
                position: fixed;
                left: -300px;
                /* Hide sidebar by default */
                transition: left 0.3s ease-in-out;
            }

            .w3-overlay {
                display: none;
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background: rgba(0, 0, 0, 0.5);
            }

            #main-content {
                margin-left: 0;
                width: 100%;
            }
        }

        .w3-sidebar {
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            width: 300px;
            background: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        #inquiryModal {
            display: none;
            /* Initially hide the modal */
        }
    </style>
</head>

<body class="w3-light-grey" style="padding-top: 50px;">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-large" style="z-index:4; background-color: #001F3F; color:white;">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="w3-right"><a href="#"><img src="images/logo.png" style="height: 40px; padding-right: 10px;"></a></span>
    </div>

    <!-- Sidebar Menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; margin-top: 30px;" id="mySidebar"><br>
        <div class="w3-container w3-row">

            <div class="w3-col s4">
                <img src="images/admin2.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>

            <div class="w3-col s8 w3-bar" style="color: #001F3F;">
                <span>Welcome, <strong><?php echo $verified_email; ?></strong></span><br>

                <a href="#" class="w3-bar-item w3-button" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-envelope"></i></a>
                <!-- Logout Icon with Confirmation -->
                <a href="#" class="w3-bar-item w3-button" onclick="confirmLogout()">
                    <i class="fa fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
        <hr>
        <!-- Dashboard Icon -->
        <div class="w3-container" style="color: #001F3F;">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block" style="color: #001F3F;">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="#" id="InquiryBtn" class="w3-bar-item w3-button w3-padding" onclick="showInquiries()"><i class="fa fa-users fa-fw"></i>  Inquiries</a>
            <a href="#" id="ProgressBtn" class="w3-bar-item w3-button w3-padding" onclick="showInProgress()"><i class="fa fa-bell fa-fw"></i> In Progress</a>

            <a href="#" id="ResolvedBtn" class="w3-bar-item w3-button w3-padding" onclick="showResolved()"><i class="fa fa-eye fa-fw"></i> Resolved</a>


        </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">



        <div class="search-container" id="searchContainer">
            <input type="text" id="searchInput" placeholder="Search inquiries..." onkeyup="filterInquiries()">
            <select id="searchFilter" style="width: auto; height: 40px;">
                <option value="all">All</option>
                <option value="date">Date</option>
                <option value="country">Country</option>
                <option value="job_title">Job Title</option>
            </select>
            <button onclick="filterInquiries()" class="w3-button w3-blue">
                <i class="fa fa-search"></i>
            </button>
        </div>

        <div class="inquiry-list" id="inquiryList">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="inquiry-item w3-card-4 w3-margin-bottom" onclick="loadInquiry(<?php echo $row['id']; ?>)" style="cursor: pointer;">
                        <header class="w3-container w3-blue">
                            <h4><strong>Name: </strong> <?php echo htmlspecialchars($row['name']); ?></h4>
                        </header>
                        <div class="w3-container">
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                            <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
                            <p><strong>Company:</strong> <?php echo htmlspecialchars($row['company']); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No inquiries found.</p>
            <?php endif; ?>

            <div style="text-align: center; display: flex; justify-content: center; align-items: center; gap: 15px;">
                <h2 style="font-weight: bolder; color: red;">Total Inquiries: <?php echo $total_inquiries; ?></h2>
                <form action="export.php" method="post">
                    <button type="submit" name="export" class="w3-button w3-green">
                        <i class="fa fa-download"></i> Export
                    </button>
                </form>
            </div>
        </div>

        <!-- In Progress List -->
        <div class="news-container" id="InProgressContainer">
            <h2>In Progress Inquiries List</h2>
        </div>
        <div class="news-list" id="InProgressList">
            <?php if (!empty($inquiries)): ?>
                <?php foreach ($inquiries as $inquiry): ?>
                    <div class="news-item">
                        <h4 style="color: red;"><strong>Name:</strong> <?php echo htmlspecialchars($inquiry['name']); ?></h4>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($inquiry['email']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($inquiry['phone']); ?></p>
                        <p><strong>Company:</strong> <?php echo htmlspecialchars($inquiry['company']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No inquiries are currently in progress.</p>
            <?php endif; ?>
        </div>



        <!-- Resolved Inquiries List -->
        <div class="news-container" id="resolvedContainer">
            <h2>Resolved Inquiries List</h2>
        </div>
        <div class="news-list" id="ResolvedList">
            <?php if (!empty($resolved)): ?>
                <?php foreach ($resolved as $resolvedInquiry): ?>
                    <div class="news-item">
                        <h4 style="color: red;"><strong>Name:</strong> <?php echo htmlspecialchars($resolvedInquiry['name']); ?></h4>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($resolvedInquiry['email']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($resolvedInquiry['phone']); ?></p>
                        <p><strong>Company:</strong> <?php echo htmlspecialchars($resolvedInquiry['company']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No inquiries are currently resolved!</p>
            <?php endif; ?>
        </div>

        <?php $conn->close(); ?>


    </div>

    <div id="inquiryModal" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-blue">
                <span onclick="document.getElementById('inquiryModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h4>Inquiry Details</h4>
            </header>
            <div class="w3-container">
                <form id="inquiryForm">
                    <p><strong>Name:</strong> <input type="text" id="inq_name" class="w3-input"></p>
                    <p><strong>Email:</strong> <input type="email" id="inq_email" class="w3-input"></p>
                    <p><strong>Phone:</strong> <input type="text" id="inq_phone" class="w3-input"></p>
                    <p><strong>Company:</strong> <input type="text" id="inq_company" class="w3-input"></p>
                    <p><strong>Country:</strong> <input type="text" id="inq_country" class="w3-input"></p>
                    <p><strong>Job_title:</strong> <input type="text" id="inq_job_title" class="w3-input"></p>
                    <p><strong>Job_details:</strong> <textarea id="inq_job_details" class="w3-input" rows="2"></textarea></p>
                    <p><strong>Status:</strong> <input type="text" id="inq_status" class="w3-input"></p>
                    <p><strong>Date:</strong> <input type="text" id="inq_date" class="w3-input" readonly></p>

                    <div class="button-container">
                        <button class="delete-btn">Delete</button>
                        <button class="edit-btn">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal that pops up when you click on "New Message" -->
    <div id="id01" class="w3-modal" style="z-index:4">
        <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-padding ">
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
                <h2 style="text-align: center;">Send Mail</h2>
            </div>
            <div class="w3-panel">
                <label>To</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text">
                <label>From</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text">
                <label>Subject</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text">
                <input class="w3-input w3-border w3-margin-bottom" style="height:150px" placeholder="What's on your mind?">
                <div class="w3-section">
                    <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel  <i class="fa fa-remove"></i></a>
                    <a class="w3-button w3-light-green w3-right" onclick="document.getElementById('id01').style.display='none'">Send  <i class="fa fa-paper-plane"></i></a>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showInquiries() {
            highlightTab("InquiryBtn");
            document.getElementById("searchContainer").style.display = "block";
            document.getElementById("inquiryList").style.display = "block";
            document.getElementById("InProgressContainer").style.display = "none";
            document.getElementById("InProgressList").style.display = "none";
            document.getElementById("resolvedContainer").style.display = "none";
            document.getElementById("ResolvedList").style.display = "none";
        }

        function showInProgress() {
            highlightTab("ProgressBtn");
            document.getElementById("InProgressContainer").style.display = "block";
            document.getElementById("InProgressList").style.display = "block";
            document.getElementById("searchContainer").style.display = "none";
            document.getElementById("inquiryList").style.display = "none";
            document.getElementById("resolvedContainer").style.display = "none";
            document.getElementById("ResolvedList").style.display = "none";
        }

        function showResolved() {
            highlightTab("ResolvedBtn");
            document.getElementById("resolvedContainer").style.display = "block";
            document.getElementById("ResolvedList").style.display = "block";
            document.getElementById("InProgressContainer").style.display = "none";
            document.getElementById("InProgressList").style.display = "none";
            document.getElementById("searchContainer").style.display = "none";
            document.getElementById("inquiryList").style.display = "none";


        }

        var mySidebar = document.getElementById("mySidebar");
        var overlayBg = document.getElementById("myOverlay");
        var mainContent = document.getElementById("main-content");


        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }

        function highlightTab(clickedId) {
            // Remove active styling from all tabs
            var tabs = document.getElementsByClassName("w3-bar-item");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.color = ""; // Reset to default
                tabs[i].style.backgroundColor = ""; // Reset background
            }

            // Apply active styling to the clicked tab
            document.getElementById(clickedId).style.color = "#0056b3"; // Change text color
            document.getElementById(clickedId).style.backgroundColor = "#f0f0f0"; // Light background
        }

        function loadInquiry(inquiryId) {
            // Send AJAX request to fetch inquiry details
            fetch('inquiry_handler.php?id=' + inquiryId)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error); // Show error if no data is found
                        return;
                    }

                    // Populate the modal form fields
                    document.getElementById('inq_name').value = data.name;
                    document.getElementById('inq_email').value = data.email;
                    document.getElementById('inq_phone').value = data.phone;
                    document.getElementById('inq_company').value = data.company;
                    document.getElementById('inq_country').value = data.country;
                    document.getElementById('inq_job_title').value = data.job_title;
                    document.getElementById('inq_job_details').value = data.job_details;
                    document.getElementById('inq_status').value = data.status;
                    document.getElementById('inq_date').value = data.created_date;

                    // Store the inquiry ID for later use
                    document.getElementById('inquiryForm').setAttribute("data-id", inquiryId);

                    // Display the modal
                    document.getElementById('inquiryModal').style.display = 'block';
                })
                .catch(error => console.error('Error fetching inquiry details:', error));
        }

        // Handle Edit Button Click
        document.querySelector('.edit-btn').addEventListener('click', function(e) {
            e.preventDefault();
            let inquiryId = document.getElementById('inquiryForm').getAttribute("data-id");

            let formData = new FormData();
            formData.append("action", "edit");
            formData.append("id", inquiryId);
            formData.append("name", document.getElementById('inq_name').value);
            formData.append("email", document.getElementById('inq_email').value);
            formData.append("phone", document.getElementById('inq_phone').value);
            formData.append("company", document.getElementById('inq_company').value);
            formData.append("country", document.getElementById('inq_country').value);
            formData.append("job_title", document.getElementById('inq_job_title').value);
            formData.append("job_details", document.getElementById('inq_job_details').value);
            formData.append("status", document.getElementById('inq_status').value);

            fetch('inquiry_handler.php', {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (!data.error) {
                        location.reload(); // Refresh the page to see the updates
                    }
                })
                .catch(error => console.error("Error updating inquiry:", error));
        });

        // Handle Delete Button Click
        document.querySelector('.delete-btn').addEventListener('click', function(e) {
            e.preventDefault();
            let inquiryId = document.getElementById('inquiryForm').getAttribute("data-id");

            if (confirm("Are you sure you want to delete this inquiry?")) {
                fetch('inquiry_handler.php', {
                        method: "POST",
                        body: JSON.stringify({
                            action: "delete",
                            id: inquiryId
                        }),
                        headers: {
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        if (!data.error) {
                            location.reload(); // Refresh the page after deletion
                        }
                    })
                    .catch(error => console.error("Error deleting inquiry:", error));
            }
        });

        // Close modal when clicking outside the content
        window.addEventListener("click", function(event) {
            if (event.target === inquiryModal) {
                inquiryModal.style.display = "none";
            }
        });

        //searching inquiries
        function filterInquiries() {
            var searchValue = document.getElementById("searchInput").value.trim();
            var filterType = document.getElementById("searchFilter").value;

            fetch("search_inquiries.php?query=" + searchValue + "&filter=" + filterType)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("inquiryList").innerHTML = data;
                })
                .catch(error => console.error("Error searching inquiries:", error));
        }

        //logout function
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "logout.php"; // Redirect to logout page
            }
        }
    </script>
</body>

</html>