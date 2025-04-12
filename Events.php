<?php
$upcomingEvents = [
    ["image" => "images/1_fraud_detect.png", "title" => "AI Fraud Detection", "date" => "12 Mar 2024", "category" => "Security", "description" => "AI-powered fraud detection leverages machine learning algorithms to identify fraudulent activities in financial transactions. It analyzes patterns, detects anomalies, and minimizes risks by continuously learning from past fraudulent cases."],
    ["image" => "images/2_trafficAI.png", "title" => "AI Traffic Analysis", "date" => "05 Feb 2024", "category" => "Transportation", "description" => "AI-driven traffic analysis optimizes road traffic management by utilizing real-time video analytics and sensor data. It helps reduce congestion, improve road safety, and optimize traffic light timing."],
    ["image" => "images/3_healthcare.png", "title" => "AI Healthcare Assistant", "date" => "20 Jan 2024", "category" => "Healthcare", "description" => "AI-powered healthcare assistants provide automated diagnostics, patient monitoring, and personalized treatment plans, improving the efficiency of the healthcare industry."]
];

$PromotionalEvents = [
    ["image" => "images/1_fraud_detect.png", "title" => "Event-1", "date" => "12 Mar 2024", "category" => "Security", "description" => "AI-powered fraud detection leverages machine learning algorithms to identify fraudulent activities in financial transactions. It analyzes patterns, detects anomalies, and minimizes risks by continuously learning from past fraudulent cases."],
    ["image" => "images/2_trafficAI.png", "title" => "Event-2", "date" => "05 Feb 2024", "category" => "Transportation", "description" => "AI-driven traffic analysis optimizes road traffic management by utilizing real-time video analytics and sensor data. It helps reduce congestion, improve road safety, and optimize traffic light timing."],
    ["image" => "images/3_healthcare.png", "title" => "Event-3", "date" => "20 Jan 2024", "category" => "Healthcare", "description" => "AI-powered healthcare assistants provide automated diagnostics, patient monitoring, and personalized treatment plans, improving the efficiency of the healthcare industry."]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26"
                        viewBox="0 96 960 960" width="26">
                        <path
                            d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                    </svg></a></li>
            <li><a href="LandingPg.php">Home</a></li>
            <!-- <li><a href="#">Resources</a></li> -->
            <li><a href="Solutions.php">Solutions</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>

        </ul>
        <ul>
            <li><a href="#"><img src="images/logo.png" style="height: 50px;"></a></li>
            <li class="hideOnMobile"><a href="LandingPg.php">Home</a></li>
            <li class="dropdown">
                <a href="#">Resources ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="Articles.php">Articles</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="Feedbacks.php">Feedbacks</a></li>
                </ul>
            </li>

            <!-- <li class="hideOnMobile"><a href="#">Resources</a></li> -->
            <li class="hideOnMobile"><a href="Solutions.php">Solutions</a></li>
            <li class="hideOnMobile"><a href="ContactUs.php">Contact Us</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                        height="26" viewBox="0 96 960 960" width="26">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a></li>
        </ul>
    </nav>

    <div class="blog">
        <h1 style="font-family: 'Playfair Display', serif; color: white;">UpComing Events</h1>
        <h4 style="font-family: 'Playfair Display', serif; color: white;">Explore the Amazing Upcoming Events</h4>

        <div class="past-container">
            <?php foreach ($upcomingEvents as $solution): ?>
                <div class="past-card" data-title="<?= $solution['title']; ?>"
                    data-date="<?= $solution['date']; ?>"
                    data-category="<?= $solution['category']; ?>"
                    data-description="<?= $solution['description']; ?>"
                    data-image="<?= $solution['image']; ?>">
                    <img src="<?= $solution['image']; ?>" alt="<?= $solution['title']; ?>">
                    <h3><?= $solution['title']; ?></h3>
                    <div class="card-footer">
                        <span class="date"><i class="fas fa-calendar-alt"></i> <?= $solution['date']; ?></span>
                        <span class="category"><i class="fas fa-folder"></i> Category: <?= $solution['category']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Upcoming Events Modal -->
    <div id="ai-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal" class="close">&times;</span>
            <img id="modal-image" src="" alt="AI Solution">
            <h2 id="modal-title"></h2>
            <p id="modal-category"></p>
            <p id="modal-description" style="display: none;"></p> <!-- Initially hidden -->
        </div>
    </div>


    <div class="container2">

        <h1 style="font-family: 'Playfair Display', serif;">Promotional Events</h1>

        <div class="past-container">
            <?php foreach ($PromotionalEvents as $solution): ?>
                <div class="past-card" data-title="<?= $solution['title']; ?>"
                    data-date="<?= $solution['date']; ?>"
                    data-category="<?= $solution['category']; ?>"
                    data-description="<?= $solution['description']; ?>"
                    data-image="<?= $solution['image']; ?>">
                    <img src="<?= $solution['image']; ?>" alt="<?= $solution['title']; ?>">
                    <h3><?= $solution['title']; ?></h3>
                    <div class="card-footer">
                        <span class="date"><i class="fas fa-calendar-alt"></i> <?= $solution['date']; ?></span>
                        <span class="category"><i class="fas fa-folder"></i> Category: <?= $solution['category']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Photo Grid -->
    <div class="w3-row-padding" id="myGrid" style="margin-bottom: 0px; background-color: #ccc;">
    <h1 style="font-family: 'Playfair Display', serif; background-color: #001F3F; text-align: center; color: white; margin-bottom: 20px;">Photo Gallery</h1>
        <div class="w3-third">
            <img src="images/ai.png" style="width:100%">
            <img src="images/2_trafficAI.png" style="width:100%">
            <img src="images/3_healthcare.png" style="width:100%">
        </div>
        <div class="w3-third">
            
            <img src="images/4_FinancialAI.png" style="width:100%">
            <img src="images/5_aiSmartHome.png" style="width:100%">
            <img src="images/6_eduAI.png" style="width:100%">
        </div>

        <div class="w3-third">
            <img src="images/AISolution.png" style="width:100%">
            <img src="images/header1.png" style="width:100%">
            <img src="images/textGeneration.png" style="width:100%">
        </div>

    </div>

    <!-- Modal -->
    <div id="past-modal" class="modal">
        <div class="modal-content">
            <span id="past-close-modal" class="close">&times;</span>
            <img id="past-modal-image" src="" alt="Solution Image">
            <h2 id="past-modal-title"></h2>
            <p id="past-modal-date"></p>
            <p id="past-modal-category"></p>
            <p id="past-modal-description"></p>
        </div>
    </div>

    <!--Footer-->
    <footer class="footer">
        <div class="footer-container">

            <!-- Social Media Icons -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                style="background-color: #3b5998; width: 20px;" href="#!" role="button"><i
                    class="fab fa-facebook-f"></i></a>

            <!-- Twitter -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                style="background-color: #55acee; width: 20px;" href="#!" role="button"><i
                    class="fab fa-twitter"></i></a>

            <!-- Google -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                style="background-color: #dd4b39; width: 20px;" href="#!" role="button"><i
                    class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                style="background-color: #ac2bac; width: 20px;" href="#!" role="button"><i
                    class="fab fa-instagram"></i></a>

            <!-- Call to Action Button -->
            <button style="background-color: grey; padding: 10px 20px; border-radius: 25px; 
               text-transform: uppercase; font-weight: bold; text-decoration: none; 
               display: inline-block; color: white; cursor: pointer;"
                onclick="window.location.href='ContactUs.php'">
                Contact Us
            </button>

            <!-- Subscription Form -->
            <div class="subscribe-box">
                <div class="input-container">
                    <input type="email" id="emailInput" placeholder="Enter your email" required>
                    <i class="fas fa-envelope"></i>
                </div>
                <button class="subscribe-btn" onclick="showSubscriptionPopup()">Subscribe</button>
            </div>
        </div>
    </footer>
    <!-- Copyright Section -->
    <div class="copyright" style="text-align: center; font-weight: bold;">
        <p>Copyright © 2024 AI-Solutions. All Rights Reserved.</p>
    </div>


    <script>
        // Dropdown functionality for navigation
        document.addEventListener("DOMContentLoaded", function() {
            const dropdown = document.querySelector(".dropdown a");
            const menu = document.querySelector(".dropdown-menu");

            dropdown.addEventListener("click", function(event) {
                event.preventDefault();
                menu.style.display = menu.style.display === "block" ? "none" : "block";
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function(event) {
                if (!dropdown.contains(event.target) && !menu.contains(event.target)) {
                    menu.style.display = "none";
                }
            });
        });


        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }

        function hideSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }

        // Used to toggle the menu on smaller screens when clicking on the menu button
        function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".ai-card");
            const modal = document.getElementById("ai-modal");
            const modalTitle = document.getElementById("modal-title");
            const modalCategory = document.getElementById("modal-category");
            const modalDescription = document.getElementById("modal-description");
            const modalImage = document.getElementById("modal-image");
            const closeModal = document.getElementById("close-modal");

            // Show modal when a card is clicked
            cards.forEach(card => {
                card.addEventListener("click", function() {
                    modalTitle.innerText = this.getAttribute("data-title");
                    modalCategory.innerHTML = `<strong><i class="fas fa-folder"></i> Category : ${this.getAttribute("data-category")}</strong>`;
                    modalDescription.innerText = this.getAttribute("data-description"); // Retrieve from PHP array
                    modalDescription.style.display = "block"; // Show description when modal opens
                    modalImage.src = this.getAttribute("data-image");

                    modal.style.display = "flex"; // Show the modal
                });
            });

            // Close modal when close button is clicked
            closeModal.addEventListener("click", function() {
                modal.style.display = "none";
            });

            // Close modal when clicking outside the content
            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });

        //PromotionalEvents
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".past-card");
            const modal = document.getElementById("past-modal");
            const modalTitle = document.getElementById("past-modal-title");
            const modalDate = document.getElementById("past-modal-date");
            const modalCategory = document.getElementById("past-modal-category");
            const modalDescription = document.getElementById("past-modal-description");
            const modalImage = document.getElementById("past-modal-image");
            const closeModal = document.getElementById("past-close-modal");

            // Open modal when a past-card is clicked
            cards.forEach(card => {
                card.addEventListener("click", function() {
                    modalTitle.innerText = this.getAttribute("data-title");
                    modalDate.innerHTML = `<strong><i class="fas fa-calendar-alt"></i> ${this.getAttribute("data-date")}</strong>`;
                    modalCategory.innerHTML = `<strong><i class="fas fa-folder"></i> Category: ${this.getAttribute("data-category")}</strong>`;
                    modalImage.src = this.getAttribute("data-image");
                    modalDescription.innerText = this.getAttribute("data-description");

                    modal.style.display = "flex"; // Show the modal
                });
            });

            // Close modal when close button is clicked
            closeModal.addEventListener("click", function() {
                modal.style.display = "none";
            });

            // Close modal when clicking outside the content
            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });

        function showSubscriptionPopup() {
            const email = document.getElementById("emailInput").value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (emailPattern.test(email)) {
                alert("✅ Thank you! You have been subscribed.");
            } else {
                alert("⚠️ Please enter a valid email address.");
            }
        }
    </script>
</body>

</html>