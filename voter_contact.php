<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Online Voting System</title>
    <link rel="stylesheet" href="voter.css" />
    <link rel="stylesheet" href="first_style.css" />
    <style>
    body {
        font-family: "Poppins", sans-serif;
        font-size: 0.88rem;
        background: blanchedalmond;
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    /* Centered and styled Contact Us heading */
    .head {
        text-align: center;
        margin-bottom: 40px;
    }

    .head h2 {
        font-size: 2.5rem;
        color: #55D6C2;
        /* text */
        text-transform: uppercase;
        letter-spacing: 2px;
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }

    .head h2::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 3px;
        background-color: orange;
        /* line */
        bottom: 0;
        left: 0;
        border-radius: 5px;
    }

    /* Contact page specific styles */
    .contact-options {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 40px;
        margin-top: 20px;
    }

    .contact-option {
        flex: 1 1 300px;
        text-align: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .contact-option:hover {
        transform: translateY(-10px);
    }

    .contact-option img {
        max-width: 100px;
        height: auto;
        margin-bottom: 15px;
    }

    .contact-option p {
        font-size: 1.1em;
        line-height: 1.6;
        color: #555;
    }

    .footer {
        background-color: #008000;
        color: white;
        text-align: center;
        margin-top: 100px;
        margin-bottom: 2px;
        padding: 10px;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>

    <div class="header">
        <img src="images/logo3.png" alt="Logo" height="80">
        <h1>Online Voting System</h1>
    </div>

    <!-- Navigation bar -->
    <div class="nav">
        <a href="front_page.php">
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
        <a href="voter_contact.php" class="select">
            <img src="images/contact.PNG" alt="Contact Icon"> Contact
        </a>
        <a href="front_admin_login.php">
            <img src="images/admin.PNG" alt="Admin Icon"> Admin
        </a>
    </div>

    <!-- Contact Form Section -->
    <div class="container">
        <div class="head">
            <h2>Contact Us</h2>
            <h1>Choose how you want to get in touch with us!</h1>
        </div>

        <div class="contact-options">
            <div class="contact-option" style="background-color: #ffd1dc;">
                <!-- Pastel pink background -->
                <img src="images/email.png" alt="Email Icon">
                <p>Email: <br> <a href="mailto:info@onlinevotingsystem.com">info@onlinevotingsystem.com</a></p>
            </div>
            <div class="contact-option" style="background-color: #ffedb3;">
                <!-- Pastel yellow background -->
                <img src="images/call.png" alt="Phone Icon">
                <p>Phone: <br> <a href="tel:+918989232345">+918989232345</a></p>
            </div>
            <div class="contact-option" style="background-color: #b8d8d8;">
                <!-- Pastel blue background -->
                <img src="images/loc.png" alt="Location Icon">
                <p>Address: <br> <a href="https://www.google.com/maps?q=St.+Xavier%27s+College,+Burdwan"
                        target="_blank">St. Xavier's College, Burdwan</a> </p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Online Voting System </p>
    </div>

</body>

</html>