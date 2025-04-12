<?php
// Array of FAQs
$faqs = [
    "What services do you offer?" => "We offer a wide range of services, including web development, mobile app development, and cloud solutions.",
    "How can I contact support?" => "You can contact us via email at support@example.com or call us at +1 234 567 890.",
    "How much do your services cost?" => "Our pricing is based on project requirements. Please fill out our contact form to get a quote."
];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-Us</title>
    <link rel="stylesheet" href="css/style.css">
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
            <li><a href="#">Contact Us</a></li>

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
            <li class="hideOnMobile"><a href="Solutions.php">Solutions</a></li>
            <li class="hideOnMobile"><a href="#">Contact Us</a></li>

            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                        height="26" viewBox="0 96 960 960" width="26">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a></li>
        </ul>
    </nav>

    <!--FAQ Sections-->
    <div class="footer">
        <h1 style="font-family: 'Playfair Display', serif;">Frequently Asked Questions</h1>
        <p style="padding-bottom: 10px; font-family: 'Playfair Display', serif;">Explore your answers here</p>

        <div class="accordion-container">
            <div>
                <button class="accordion">What industries can benefit from AI-integrated solutions?</button>
                <div class="panel">
                    <p>Our AI solutions cater to a wide range of industries, including healthcare, finance, retail, manufacturing, logistics, and more, helping businesses automate processes, enhance decision-making, and improve efficiency.</p>
                </div>
            </div>

            <div>
                <button class="accordion">How can AI improve my business operations?</button>
                <div class="panel">
                    <p>AI can streamline workflows, analyze large datasets for better insights, automate repetitive tasks, enhance customer interactions through chatbots, and optimize decision-making with predictive analytics.</p>
                </div>
            </div>

            <div>
                <button class="accordion">Are your AI solutions customizable to specific business needs?</button>
                <div class="panel">
                    <p>Yes! We tailor our AI solutions to meet your industry-specific requirements, ensuring seamless integration with your existing systems and delivering measurable business impact.</p>
                </div>
            </div>

            <div>
                <button class="accordion">How secure are AI-powered solutions for my business?</button>
                <div class="panel">
                    <p>We prioritize security by leveraging robust encryption, compliance with industry standards, and responsible AI practices to protect your data and ensure privacy in all our AI-driven solutions.</p>
                </div>
            </div>
        </div>

    </div>

    <!--Contact Us-->
    <div style="display: flex; justify-content: center; align-items: flex-start; padding: 40px; background-color: #ccc;">
        <!-- Left Side: Contact Information -->
        <div style="flex: 1; padding: 20px; font-size: large;">
            <h2 style="font-family: 'Playfair Display', serif;">Contact Information</h2>
            <p><i class="fas fa-envelope"></i> Email: <a href="mailto:info@ai-solutions.com">info@ai-solutions.com</a></p>
            <p><i class="fas fa-map-marker-alt"></i> Address: 123 AI Street, Tech City, USA</p>
            <p><i class="fas fa-phone"></i> Phone: +1 234 567 8900</p>

            <!-- Google Map -->
            <div style="margin-top: 20px;">

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31019.720587415813!2d100.58587925!3d13.629449999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sth!4v1742924244335!5m2!1sen!2sth" width="600" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>

        <div style="flex: 1; padding: 20px; background-color: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 style="font-family: 'Playfair Display', serif; text-align: center;">Contact Us</h2>
            <p style="padding-bottom: 10px; font-family: 'Playfair Display', serif; text-align: center;">We’d love to hear from you!</p>

            <form action="data_process.php" method="post" class="contact-form">
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i> Phone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>

                <div class="form-group">
                    <label for="company"><i class="fas fa-building"></i> Company Name</label>
                    <input type="text" id="company" name="company" placeholder="Enter the company name" required>
                </div>

                <div class="form-group">
                    <label for="country"><i class="fas fa-globe"></i> Country</label>
                    <select id="country" name="country" required>
                        <option value="" disabled selected>Select your country</option>
                        <option value="USA">United States</option>
                        <option value="UK">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                        <option value="India">India</option>
                        <option value="Germany">Germany</option>
                        <option value="France">France</option>
                        <option value="Japan">Japan</option>
                        <option value="China">China</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="job-title"><i class="fas fa-briefcase"></i> Job Title</label>

                    <input type="text" id="job-title" name="job-title" placeholder="Enter your job title" required>
                </div>

                <div class="form-group">
                    <label for="job-details"><i class="fas fa-file-alt"></i> Job Details</label>
                    <textarea id="job-details" name="job-details" placeholder="Describe your job role and responsibilities" rows="4"></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Submit
                </button>
            </form>
        </div>
    </div>

    <!-- Chatbot Container -->
    <div class="chatbot-container" id="chatbot-container">
        <div class="chatbot-header">
            <h3>AI Chatbot</h3>
            <button id="close-chatbot">&times;</button>
        </div>

        <div class="chatbot-messages">
            <p>Hello! How can I assist you today?</p>
            <p>Select a question:</p>

            <?php foreach ($faqs as $question => $answer): ?>
                <div class="faq-question" data-answer="<?php echo htmlspecialchars($answer); ?>">
                    <?php echo htmlspecialchars($question); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <input type="text" id="chatbot-input" placeholder="Type your message..." />
    </div>

    <!-- Chatbot Toggle Button -->
    <button id="chatbot-toggle">
        <i class="fas fa-robot"></i>
    </button>

    <!-- <script type="text/javascript" src="https://form.jotform.com/jsform/250731990946466"></script> -->
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
        document.addEventListener("DOMContentLoaded", function() {
            const chatbotToggle = document.getElementById("chatbot-toggle");
            const chatbotContainer = document.getElementById("chatbot-container");
            const closeChatbot = document.getElementById("close-chatbot");
            const faqQuestions = document.querySelectorAll(".faq-question");
            const chatbotMessages = document.querySelector(".chatbot-messages");

            chatbotToggle.addEventListener("click", function() {
                chatbotContainer.style.display = "block";
            });

            closeChatbot.addEventListener("click", function() {
                chatbotContainer.style.display = "none";
            });

            // Close chatbot when clicking outside
            document.addEventListener("click", function(event) {
                if (!chatbotContainer.contains(event.target) && event.target !== chatbotToggle) {
                    chatbotContainer.style.display = "none";
                }
            });

            // Display answer when FAQ is clicked
            faqQuestions.forEach(question => {
                question.addEventListener("click", function() {
                    const answer = this.getAttribute("data-answer");

                    // Create user message element
                    const userMessage = document.createElement("p");
                    userMessage.classList.add("user-message");
                    userMessage.textContent = this.innerText;

                    // Create bot response element
                    const botMessage = document.createElement("p");
                    botMessage.classList.add("bot-message");
                    botMessage.textContent = answer;

                    // Append messages to chat container
                    chatbotMessages.appendChild(userMessage);
                    chatbotMessages.appendChild(botMessage);

                    // Scroll to the latest message
                    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
                });
            });
        });

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

        //Accordion Script
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
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