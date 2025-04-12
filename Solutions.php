<?php
$past_solutions = [
    ["image" => "images/1_fraud_detect.png", "title" => "AI Fraud Detection", "date" => "12 Mar 2024", "category" => "Education", "description" => "AI-powered fraud detection leverages machine learning algorithms to identify fraudulent activities in financial transactions. It analyzes patterns, detects anomalies, and minimizes risks by continuously learning from past fraudulent cases."],
    ["image" => "images/2_trafficAI.png", "title" => "AI Traffic Analysis", "date" => "05 Feb 2024", "category" => "Transportation", "description" => "AI-driven traffic analysis optimizes road traffic management by utilizing real-time video analytics and sensor data. It helps reduce congestion, improve road safety, and optimize traffic light timing."],
    ["image" => "images/3_healthcare.png", "title" => "AI Healthcare Assistant", "date" => "20 Jan 2024", "category" => "Healthcare", "description" => "AI-powered healthcare assistants provide automated diagnostics, patient monitoring, and personalized treatment plans, improving the efficiency of the healthcare industry."],
    ["image" => "images/4_FinancialAI.png", "title" => "AI Financial Forecasting", "date" => "10 Dec 2023", "category" => "Finance", "description" => "AI financial forecasting utilizes predictive analytics to provide insights into market trends, helping businesses make data-driven financial decisions."],
    ["image" => "images/5_aiSmartHome.png", "title" => "AI Smart Home Automation", "date" => "30 Nov 2023", "category" => "IoT", "description" => "AI-powered smart home automation enhances security and energy efficiency by enabling intelligent control over home devices."],
    ["image" => "images/6_eduAI.png", "title" => "AI Personalized Learning", "date" => "15 Oct 2023", "category" => "Education", "description" => "AI-driven personalized learning systems adapt to individual student needs, providing customized educational experiences."]
];

$ai_solutions = [
    ["image" => "images/ai.png", "title" => "AI Chatbot", "category" => "Automation", "description" => "Our AI-powered chatbot helps businesses automate customer support and engagement."],
    ["image" => "images/AISolution.png", "title" => "Image Recognition", "category" => "Computer Vision", "description" => "Our AI-based image recognition system helps in detecting objects and facial recognition."],
    ["image" => "images/2_trafficAI.png", "title" => "AI Traffic Analytics", "category" => "Transportation", "description" => "AI-driven traffic analysis optimizes road traffic management by utilizing real-time video analytics and sensor data. It helps reduce congestion, improve road safety, and optimize traffic light timing."],
    ["image" => "images/textGeneration.png", "title" => "AI Text Generation", "category" => "NLP", "description" => "AI-driven text generation helps in automating content creation and summarization."],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solutions</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/style.css?ver=<?php echo time(); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26"
                        viewBox="0 96 960 960" width="26">
                        <path
                            d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                    </svg></a></li>
            <li><a href="LandingPg.php">Home</a></li>
            <!-- <li><a href="#">Resources</a></li> -->
            <li><a href="#">Solutions</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>

        </ul>
        <ul>
            <li><a href="#"><img src="images/logo.png" style="height: 50px;"></a></li>
            <li class="hideOnMobile"><a href="LandingPg.php">Home</a></li>
            <li class="dropdown">
                <a href="#">Resources ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="Articles.php">Articles</a></li>
                    <li><a href="Events.php">Events</a></li>
                    <li><a href="Feedbacks.php">Feedbacks</a></li>
                </ul>
            </li>

            <!-- <li class="hideOnMobile"><a href="#">Resources</a></li> -->
            <li class="hideOnMobile"><a href="#">Solutions</a></li>
            <li class="hideOnMobile"><a href="ContactUs.php">Contact Us</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                        height="26" viewBox="0 96 960 960" width="26">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a></li>
        </ul>
    </nav>

    <!--Avaliable AI-Solutions-->
    <div class="footer">
        <h1 style="font-family: 'Playfair Display', serif;">AI-Solutions</h1>

        <div class="ai-solutions-container">
            <p class="frame-container">
                AI-Solution is an AI development company providing Generative AI services and solutions for businesses to improve processes and productivity with AI.
            </p>

            <div class="search-box">
                <input type="text" placeholder="Search by category" class="search-input">
                <button class="search-button" id="searchButton">Search</button>
            </div>
        </div>

        <!-- AI Solutions Cards Section -->
        <div class="ai-cards-container">
            <?php foreach ($ai_solutions as $solution): ?>
                <div class="ai-card"
                    data-title="<?= htmlspecialchars($solution['title']); ?>"
                    data-category="<?= htmlspecialchars($solution['category']); ?>"
                    data-description="<?= htmlspecialchars($solution['description']); ?>"
                    data-image="<?= htmlspecialchars($solution['image']); ?>">
                    <img src="<?= htmlspecialchars($solution['image']); ?>" alt="<?= htmlspecialchars($solution['title']); ?>">
                    <h3><?= htmlspecialchars($solution['title']); ?></h3>
                    <div class="card-footer">
                        <span class="category"><i class="fas fa-folder"></i> Category : <?= htmlspecialchars($solution['category']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- AI Solutions Modal -->
        <div id="ai-modal" class="modal">
            <div class="modal-content">
                <span id="close-modal" class="close">&times;</span>
                <img id="modal-image" src="" alt="AI Solution">
                <h2 id="modal-title"></h2>
                <p id="modal-category"></p>
                <p id="modal-description" style="display: none;"></p> <!-- Initially hidden -->
            </div>
        </div>

    </div>

    <!--Past Solutions -->
    <div class="contact-us">
        <h1 style="font-family: 'Playfair Display', serif; color: #001F3F">Past Solutions</h1>
        <div class="past-container">
            <?php foreach ($past_solutions as $solution): ?>
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
            const cardsContainer = document.querySelector(".ai-cards-container");
            let allCards = Array.from(document.querySelectorAll(".ai-card")); // Store all cards initially
            const searchInput = document.querySelector(".search-input");
            const searchButton = document.getElementById("searchButton");

            const modal = document.getElementById("ai-modal");
            const modalTitle = document.getElementById("modal-title");
            const modalCategory = document.getElementById("modal-category");
            const modalDescription = document.getElementById("modal-description");
            const modalImage = document.getElementById("modal-image");
            const closeModal = document.getElementById("close-modal");

            function attachModalListeners() {
                // Select all AI cards again (since they might have been removed and re-added)
                const cards = document.querySelectorAll(".ai-card");

                cards.forEach(card => {
                    card.addEventListener("click", function() {
                        modalTitle.innerText = this.getAttribute("data-title");
                        modalCategory.innerHTML = `<strong><i class="fas fa-folder"></i> Category: ${this.getAttribute("data-category")}</strong>`;
                        modalDescription.innerText = this.getAttribute("data-description");
                        modalDescription.style.display = "block";
                        modalImage.src = this.getAttribute("data-image");

                        modal.style.display = "flex"; // Show the modal
                    });
                });
            }

            // Initial binding of modal events
            attachModalListeners();

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

            function filterSolutions() {
                const query = searchInput.value.toLowerCase().trim();
                cardsContainer.innerHTML = ""; // Clear the current content

                let hasResults = false;

                allCards.forEach(card => {
                    const category = card.getAttribute("data-category").toLowerCase();

                    if (query === "" || category.includes(query)) {
                        cardsContainer.appendChild(card); // Add matching card back
                        hasResults = true;
                    }
                });

                // Show message if no results are found
                if (!hasResults) {
                    cardsContainer.innerHTML = "<h3 style='color: white;font-weight: bolder'>No AI solutions Currently for this category.</h3>";
                }

                // Reattach modal event listeners after filtering
                attachModalListeners();
            }

            // Trigger search when the button is clicked
            searchButton.addEventListener("click", filterSolutions);

            // Trigger search when "Enter" key is pressed
            searchInput.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    filterSolutions();
                }
            });
        });



        //modal for Past Solutions
        document.addEventListener("DOMContentLoaded", function() {
            const pastUI = document.querySelector(".past-container");
            let allpastCards = Array.from(document.querySelectorAll(".past-card"));
            const searchInput = document.querySelector(".search-input");
            const searchButton = document.getElementById("searchButton");


            // const cards = document.querySelectorAll(".past-card");
            const modal = document.getElementById("past-modal");
            const modalTitle = document.getElementById("past-modal-title");
            const modalDate = document.getElementById("past-modal-date");
            const modalCategory = document.getElementById("past-modal-category");
            const modalDescription = document.getElementById("past-modal-description");
            const modalImage = document.getElementById("past-modal-image");
            const closeModal = document.getElementById("past-close-modal");


            function attachModalListeners() {
                // Select all AI cards again (since they might have been removed and re-added)
                const pastCards = document.querySelectorAll(".past-card");

                // Open modal when a past-card is clicked
                pastCards.forEach(card => {
                    card.addEventListener("click", function() {
                        modalTitle.innerText = this.getAttribute("data-title");
                        modalDate.innerHTML = `<strong><i class="fas fa-calendar-alt"></i> ${this.getAttribute("data-date")}</strong>`;
                        modalCategory.innerHTML = `<strong><i class="fas fa-folder"></i> Category: ${this.getAttribute("data-category")}</strong>`;
                        modalImage.src = this.getAttribute("data-image");
                        modalDescription.innerText = this.getAttribute("data-description");

                        modal.style.display = "flex"; // Show the modal
                    });
                });
            }

            // Initial binding of modal events
            attachModalListeners();

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

            function filterSolutions() {
                const query = searchInput.value.toLowerCase().trim();
                pastUI.innerHTML = ""; // Clear the current content

                let hasResults = false;

                allpastCards.forEach(card => {
                    const category = card.getAttribute("data-category").toLowerCase();

                    if (query === "" || category.includes(query)) {
                        pastUI.appendChild(card); // Add matching card back
                        hasResults = true;
                    }
                });

                // Show message if no results are found
                if (!hasResults) {
                    pastUI.innerHTML = "<h2 style='color: #001F3F; text-align: center; font-weight: bolder'>No such past solutions.</h2>";
                }

                // Reattach modal event listeners after filtering
                attachModalListeners();
            }

            // Trigger search when the button is clicked
            searchButton.addEventListener("click", filterSolutions);

            // Trigger search when "Enter" key is pressed
            searchInput.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    filterSolutions();
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