<!DOCTYPE html>
<html>

<head>
    <title>Online Voting System</title>
    <link rel="stylesheet" href="voter.css" />
    <link rel="stylesheet" href="first_style.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            font-size: 0.88rem;
            background: blanchedalmond;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .marquee-container {
            background-color: #000;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .marquee-container marquee {
            font-size: 1.2em;
            color: blanchedalmond;
            font-weight: bold;

        }

        .content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.8);
        }

        .heading-container {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .heading-container .gradient-box {
            font-size: 3em;
            color: navy;
            padding: 10px 20px;
            background: linear-gradient(to right, orange, white, green);
            border-radius: 20px;
            display: inline-block;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /*text shadow*/
        }

        .heading-container h2 {
            font-size: 1.5em;
            color: black;
            margin: 10px 0;
            font-style: italic;
        }

        .side-image {
            width: 150px;
            height: auto;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);

        }

        .heading-container .side-image:nth-child(1) {
            left: 70px;
        }

        .heading-container .side-image:nth-child(3) {
            right: 50px;

        }

        .slider {
            position: relative;
            width: 100%;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .slides {
            display: flex;
            transition: transform 1s ease;
        }

        .slider img {
            width: 100%;
            height: auto;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .arrow-left {
            left: 10px;
        }

        .arrow-right {
            right: 10px;
        }

        .notice-section {
            background-color: #0f0f0f;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            height: 250px;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .notice-section h2 {
            font-style: italic;
            color: white;
            margin-bottom: 10px;
        }

        .notice-section p {
            color: orange;
            margin-bottom: 10px;
        }

        .scroll-up,
        .scroll-down {
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-up {
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .scroll-down {
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .content-section {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            position: relative;
            background-color: lightpink;
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .content-section .section-heading {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #55D6C2;
            color: black;
            font-size: 1.5em;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content-section img {
            max-width: 150px;
            margin-right: 20px;
        }

        .content-section p {
            font-size: 1.5em;
            margin-top: 60px;
        }

        .content-section ul {
            margin-top: 60px;
            font-size: 1.05rem;
        }

        .faq-section {
            margin-top: 50px;
        }

        .faq-question {
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            margin: 10px 0;
        }

        .faq-answer {
            display: none;
            font-size: 1rem;
            font-weight: bold;
            margin: 10px 0 20px 0;
            padding: 10px;
            border-left: 3px solid orange;
            background: lightblue;
        }

        .vote-button {
            display: inline-block;
            font-size: 2rem;
            padding: 12px 24px;
            margin-bottom: 20px;
            background-color: purple;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .vote-button:hover {
            background-color: indigo;
            transform: scale(1.05);
        }

        .vote-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(128, 0, 128, 0.5);
        }


        .footer {
            background-color: darkgreen;
            color: white;
            text-align: center;
            padding: 10px;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- HEADING -->
    <div class="header">
        <img src="images/logo3.png" alt="Logo">
        <h1>Online Voting System</h1>
    </div>

    <!-- Navigation bar -->
    <div class="nav">
        <a href="#" class="select">
            <img src="images/home.PNG" alt="Home Icon"> Home
        </a>
        <a href="front_page_about.php">
            <img src="images/about.PNG" alt="About Icon"> About
        </a>
        <a href="voter_register.php">
            <img src="images/register.JFIF" alt="Register Icon"> Register
        </a>
        <a href="login_instruction.php">
            <img src="images/votelogo.JFIF" alt="Vote Cast Icon"> Login
        </a>
        <a href="voter_contact.php">
            <img src="images/contact.PNG" alt="Contact Icon"> Contact
        </a>
        <a href="front_admin_login.php">
            <img src="images/admin.PNG" alt="Admin Icon"> Admin
        </a>
    </div>

    <!-- Marquee -->
    <div class="marquee-container">
        <marquee behavior="scroll" direction="left">
            Not Forget to bring your voter ID Card during vote casting.
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Choose your candidate wisely.
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Make sure to register online for the upcoming elections.
        </marquee>
    </div>


    <div class="content">
        <!-- Heading and Subheading -->
        <div class="heading-container">
            <img src="images/ashokachakra.png" alt="Ashok Chakra" class="side-image">
            <div class="gradient-box">YOUR VOTE, YOUR POWER</div>
            <img src="images/emblem.png" alt="Ashoka Stambh" class="side-image">
            <h2>Step into the future of voting with Online Voting System</h2>
        </div>

        <!-- Image and Paragraph -->
        <div class="content-section">
            <img src="images/const.jpeg" alt="Placeholder Image">
            <div class="section-heading">Unlocking the Power Enshrined </div>
            <p>In the Indian Constitution, every citizen aged 18 and above holds the key to shape our nation's destiny. Once registered, they wield the solemn right to cast their ballot in national, state, district, and local elections. Upholding the sanctity of democracy, no one shall be deprived of this privilege except under stringent disqualification criteria.

                In the ballot box, each voter's voice echoes with singular clarity — a testament to equality and civic duty. Each registered voter aligns with a single constituency, where their residence not only designates their polling station but also charts the course of candidates vying for their endorsement.

                This electoral tapestry weaves together the aspirations of millions, where each vote resonates beyond its mark, shaping the future with unwavering resolve.</p>
        </div>

        <!-- Slider -->
        <div class="slider">
            <div class="slides">
                <img src="images/imgai1.JPG" alt="Image 1">
                <img src="images/imgai2.JPG" alt="Image 2">
                <img src="images/imgai3.JPG" alt="Image 3">
                <img src="images/imgai4.JPG" alt="Image 4">

            </div>
            <button class="arrow arrow-left" onclick="moveSlide(-1)">&#10094;</button>
            <button class="arrow arrow-right" onclick="moveSlide(1)">&#10095;</button>
        </div>

        <script>
            let currentIndex = 0;

            function moveSlide(direction) {
                const slides = document.querySelector('.slides');
                const totalSlides = document.querySelectorAll('.slides img').length;

                currentIndex += direction;

                if (currentIndex < 0) {
                    currentIndex = totalSlides - 1;
                } else if (currentIndex >= totalSlides) {
                    currentIndex = 0;
                }

                const offset = -currentIndex * 100;
                slides.style.transform = `translateX(${offset}%)`;
            }

            function autoSlide() {
                moveSlide(1);
            }

            setInterval(autoSlide, 3000); // Change slide every 3 seconds
        </script>

        <div class="content-section">
            <img src="images/how.jpeg" alt="Placeholder Image">
            <div class="section-heading">HOW TO VOTE:</div>
            <ul>
                <li><strong>Register/Login:</strong> Secure your access by registering or logging into your account.</li>
                <li><strong>Verify Your Identity:</strong> Complete a quick and easy verification process to ensure your vote is protected.</li>
                <li><strong>Cast Your Vote:</strong> Follow the user-friendly guide to select your candidates and submit your vote</li>
            </ul>
        </div>

        <!-- Safety Measures Section -->
        <div class="content-section">
            <img src="images/safety.jpeg" alt="Safety Measures">
            <div class="section-heading">SAFETY MEASURES</div>
            <p>Your safety is our priority. Our system uses advanced encryption to protect your personal information and ensure your vote is confidential and secure. We follow strict protocols to prevent tampering and fraud, maintaining the integrity of the voting process at every step. From the moment you log in to cast your vote, our robust security measures work tirelessly to safeguard your data. Trust that your voice is protected and your vote is accurately counted, giving you peace of mind as you participate in this essential democratic process. Your trust in our system is the cornerstone of our mission, and we are dedicated to providing a secure and seamless voting experience for all.</p>
        </div>

        <!-- Notice Board -->
        <div class="notice-section">
            <h2>IMPORTANT NOTICE</h2>
            <p>(*) The first phase of Voting will starts from 1st August 2024</p>
            <p>(*) The second phase of Voting will starts from 7th August 2024</p>
            <p>(*) The third phase of Voting will starts from 14th August 2024</p>
            <p>(*) The fourth phase of Voting will starts from 21st August 2024</p>
            <p>(*) The fifth phase of Voting will starts from 28th August 2024</p>
            <!-- Add more notices as needed -->
            <button class="scroll-up" onclick="scrollUp()">&#9650;</button>
            <button class="scroll-down" onclick="scrollDown()">&#9660;</button>
        </div>

        <script>
            const noticeSection = document.querySelector('.notice-section');

            function scrollUp() {
                noticeSection.scrollTop -= 50; // Adjust the value for scrolling speed
            }

            function scrollDown() {
                noticeSection.scrollTop += 50; // Adjust the value for scrolling speed
            }
        </script>

        <div class="content-section">
            <img src="images/voice.jpeg" alt="Placeholder Image">
            <div class="section-heading">YOUR VOICE</div>
            <p>Your vote is your voice, a powerful tool that shapes the future of our nation. Join millions of fellow Indians in this vital democratic process, where every vote counts. Whether you are a first-time voter excited to make your mark or a seasoned participant with years of experience, your contribution is more important now than ever. Every election presents an opportunity to influence the direction of our country, and your participation is crucial in ensuring that your beliefs and values are represented. Together, let’s create a brighter future for all by actively engaging in the electoral process. Remember, your voice matters, and your vote can make a difference!</p>
        </div>

        <div class="content">
            <img src="images/cast.jpeg" style="max-width: 100%; height: 800px; margin-bottom:20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);">
            <!-- VOTE BUTTON -->
            <div style="text-align: center;">
                <a href="voter_register.php" class="vote-button">Cast Your Vote</a>
            </div>
        </div>

        <div class="content-section">
            <img src="images/support.jpeg" alt="Placeholder Image">
            <div class="section-heading">SUPPORT</div>
            <p>Got questions or need assistance? Our dedicated support team is here to assist you every step of the way. Visit our <a href="voter_contact.php">Contact Page</a> for personalized assistance and guidance on any aspect of our Online Voting System.</p>
        </div>

        <!-- FAQ Section -->
        <div class="content-section">
            <img src="images/faq.jpeg" alt="Safety Measures">
            <div class="section-heading">Frequently Asked Question </div>
            <div class="faq-section">
                <div class="faq-question">* What is Online Voting System?</div>
                <div class="faq-answer">The Online Voting System allows voters to cast their votes through the internet, ensuring convenience and accessibility.</div>

                <div class="faq-question">* How secure is the Online Voting System?</div>
                <div class="faq-answer">The system uses advanced encryption and security protocols to ensure that all votes are confidential and tamper-proof.</div>

                <div class="faq-question">* Can I vote multiple times?</div>
                <div class="faq-answer">No, each voter can only vote once. The system ensures that no duplicate votes are counted.</div>

                <div class="faq-question">* If I encounter any issues or failures preventing me from casting my vote, will I be able to vote again?</div>
                <div class="faq-answer"> Yes , If you are unable to cast or submit your vote, you will have 3 attempts to do so. If you fail to submit your vote within these three attempts, you will not be able to cast your vote again.</div>

                <div class="faq-question">* What do I need to vote online?</div>
                <div class="faq-answer">You need a valid voter ID and access to the internet. You will also need to complete a registration process to verify your identity.</div>
                <p> To learn more about our website, please visit our <a href="front_page_about.php">About Page</a> , where you can find additional details about us </p>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const questions = document.querySelectorAll('.faq-question');

                questions.forEach(question => {
                    question.addEventListener('click', function() {
                        const answer = this.nextElementSibling;
                        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
                    });
                });
            });
        </script>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2024 Online Voting System</p>
        </div>
    </div>
</body>

</html>