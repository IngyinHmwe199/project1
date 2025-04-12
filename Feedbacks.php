<?php
$partners = [
    ["image" => "images/Gemini.png",  "description" => "Partnering with Gemini, we provide innovative AI-integrated solutions that help our clients streamline operations, enhance decision-making, and drive digital transformation."],
    ["image" => "images/OpenAI.png", "description" => "Collaboration with OpenAI empowers innovation by combining cutting-edge AI technology with human creativity to solve real-world problems efficiently and responsibly."],
    ["image" => "images/Nvidia.pn.png",  "description" => "As a trusted partner, NVIDIA empowers our AI-integrated solutions with industry-leading GPU technology, enabling us to deliver faster, smarter, and more efficient services to our clients."],
    ["image" => "images/MicroSoft.png",  "description" => "Our collaboration with Microsoft enhances our AI-integrated solutions by leveraging Azure's robust cloud infrastructure and AI tools, ensuring secure, scalable, and intelligent services for our clients."]
];

$feedbacks = [
    ["image" => "images/feedbackUser/UserFeedback.png", "customer" => "Alice Johnson", "rating" => 5, "comment" => "Great experience! Highly recommended."],
    ["image" => "images/feedbackUser/UserFeedback.png", "customer" => "Michael Smith", "rating" => 4, "comment" => "Good service but could improve response time."],
    ["image" => "images/feedbackUser/UserFeedback.png", "customer" => "Samantha Lee", "rating" => 5, "comment" => "Absolutely loved it! Would use again."],
    ["image" => "images/feedbackUser/UserFeedback.png", "customer" => "David Brown", "rating" => 3, "comment" => "It was okay, but I've seen better."],
    ["image" => "images/feedbackUser/UserFeedback.png", "customer" => "Emma Wilson", "rating" => 4, "comment" => "Very satisfied with the service."],
    ["image" => "images/feedbackUser/UserFeedback.png", "customer" => "James Miller", "rating" => 5, "comment" => "Fantastic! Couldn't ask for more."],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

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
                    <li><a href="Events.php">Events</a></li>
                    <li><a href="#">Feedbacks</a></li>
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


    <!-- Collaboration -->
    <div class="container2">
        <h1 style="font-family: 'Playfair Display', serif;">Collaboration & Partners</h1>
        <div class="flipColumn">
            <?php foreach ($partners as $partner): ?>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="<?php echo $partner['image']; ?>" alt="Avatar" style="width:300px;height:200px; border-radius: 10px;">
                        </div>
                        <div class="flip-card-back">
                            
                            <p style="align-items: center; padding: 30px;"><?php echo $partner['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Customer Feedbacks -->
    <div class="blog">
        <h1 style="font-family: 'Playfair Display', serif; color: white;">Customer Feedbacks</h1>
        <h4 style="font-family: 'Playfair Display', serif; color: white; margin-bottom: 20px;">Checkout what customers say</h4>
        <div class="feedbackGrid">
            <?php foreach ($feedbacks as $feedback): ?>
                <div class="feedback-card">
                    <img src="<?php echo $feedback['image']; ?>" alt="Customer Image" class="feedback-image">
                    <div class="feedback-content">
                        <h3><?php echo $feedback['customer']; ?></h3>
                        <p><?php echo $feedback['comment']; ?></p>
                        <div class="stars">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <span class="fa fa-star <?php echo $i < $feedback['rating'] ? 'checked' : ''; ?>"></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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