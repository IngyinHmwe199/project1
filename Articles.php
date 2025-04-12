<?php
$articles = [
    ["image" => "images/1_fraud_detect.png", "heading" => "Understanding the Role of AI in Modern Industries", "date" => "12 Mar 2024", "category" => "Security", "url" => "https://www.usf.edu/health/public-health/news/2024/ai-in-osh-practices.aspx#:~:text=AI%20technologies%2C%20equipped%20with%20machine,for%20swift%20corrective%20actions1."],
    ["image" => "images/2_trafficAI.png", "heading" => "AI Traffic Analysis", "date" => "05 Feb 2024", "category" => "Transportation", "url" => "https://www.ptvgroup.com/en/application-areas/ai-in-transportation#:~:text=AI%20is%20also%20being%20used,travel%20time%20and%20fuel%20consumption."],
    ["image" => "images/3_healthcare.png", "heading" => "AI Healthcare Assistant", "date" => "20 Jan 2024", "category" => "Healthcare", "url" => "https://www.foreseemed.com/artificial-intelligence-in-healthcare"]
];

$blog = [
    ["image" => "images/1_fraud_detect.png", "title" => "AI Fraud Detection", "date" => "12 Mar 2024", "category" => "Security", "url" => "https://www.usf.edu/health/public-health/news/2024/ai-in-osh-practices.aspx#:~:text=AI%20technologies%2C%20equipped%20with%20machine,for%20swift%20corrective%20actions1."],
    ["image" => "images/2_trafficAI.png", "title" => "AI Traffic Analysis", "date" => "05 Feb 2024", "category" => "Transportation", "url" => "https://www.ptvgroup.com/en/application-areas/ai-in-transportation#:~:text=AI%20is%20also%20being%20used,travel%20time%20and%20fuel%20consumption."],
    ["image" => "images/3_healthcare.png", "title" => "AI Healthcare Assistant", "date" => "20 Jan 2024", "category" => "Healthcare", "url" => "https://www.foreseemed.com/artificial-intelligence-in-healthcare"]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
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
                    <li><a href="#">Articles</a></li>
                    <li><a href="Events.php">Events</a></li>
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

    <div class="container2">

        <h1 style="font-family: 'Playfair Display', serif;">ARTICLES</h1>
        <h4 style="font-family: 'Playfair Display', serif;">Explore the AI-Related Articles Here</h4>


        <?php foreach ($articles as $article): ?>
            <div class="article-card">
                <div class="article-image">
                    <img src="<?php echo $article['image']; ?>" alt="Article Image">
                </div>
                <div class="article-content">
                    <p class="article-info">
                        <i class="fas fa-calendar-alt"></i> <?php echo $article['date']; ?>
                        &nbsp; | &nbsp;
                        <i class="fas fa-tag"></i> <?php echo $article['category']; ?>
                    </p>
                    <hr>
                    <h2><?php echo $article['heading']; ?></h2>
                    <a href="<?php echo $article['url']; ?>" class="read-more" target="_blank" rel="noopener noreferrer">Read More →</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="blog">
        <h1 style="font-family: 'Playfair Display', serif; color: white;">BLOGS</h1>

        <div class="past-container">
            <?php foreach ($blog as $solution): ?>
                <div class="past-card" data-url="<?= $solution['url']; ?>">
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
            const cards = document.querySelectorAll(".past-card");

            cards.forEach(card => {
                card.addEventListener("click", function() {
                    const url = this.getAttribute("data-url");
                    if (url) {
                        window.open(url, "_blank"); // Open link in a new tab
                    }
                });
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