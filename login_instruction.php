<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Instructions</title>
    <link rel="stylesheet" href="voter.css">
    <link rel="stylesheet" href="first_style.css">
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
        max-width: 800px;
        font-size: 1.2rem;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.8);
    }

    .container h2 {
        text-align: center;
        color: navy;
        margin-bottom: 20px;
    }

    .container ol {
        margin-left: 30px;
        margin-right: 40px;
        margin-bottom: 20px;
    }

    .container ol li {
        margin-bottom: 10px;
    }

    .terms-checkbox {
        display: flex;
        margin-left: 50px;
        margin-bottom: 20px;
        align-items: center;

    }

    .terms-checkbox input[type="checkbox"] {
        margin-right: 15px;
        transform: translateY(1px);
    }

    .terms-checkbox a {
        text-decoration: none;
        color: navy;
    }

    .proceed-button {
        display: block;
        width: 200px;
        margin: 0 auto;
        margin-top: 40px;
        margin-bottom: 20px;
        text-align: center;
        padding: 10px;
        background-color: orange;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .proceed-button:hover {
        background-color: green;
        transform: scale(1.05);
    }

    .proceed-button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(128, 0, 128, 0.5);
    }
    </style>
</head>

<body>
    <!-- Heading and Navigation Bar -->
    <div class="header">
        <img src="images/logo3.png" alt="Logo">
        <h1>Online Voting System</h1>
    </div>

    <div class="nav">
        <a href="#">
            <img src="images/home.PNG" alt="Home Icon"> Home
        </a>
        <a href="front_page_about.php">
            <img src="images/about.PNG" alt="About Icon"> About
        </a>
        <a href="voter_register.php">
            <img src="images/register.JFIF" alt="Register Icon"> Register
        </a>
        <a href="login_instruction.php" class="select">
            <img src="images/votelogo.JFIF" alt="Vote Cast Icon"> Login
        </a>
        <a href="voter_contact.php">
            <img src="images/contact.PNG" alt="Contact Icon"> Contact
        </a>
        <a href="front_admin_login.php">
            <img src="images/admin.PNG" alt="Admin Icon"> Admin
        </a>
    </div>

    <div class="container">
        <!-- Login Instructions -->
        <h2>LOGIN INSTRUCTIONS</h2>
        <ol>
            <li>Register yourself before logging in.</li>
            <li>Ensure you keep your login credentials confidential to prevent unauthorized access.</li>
            <li>After logging in, you will have only 15 seconds to cast your vote, Do It Carefully.</li>
            <li>Make sure your internet connection is stable during the voting process to avoid interruptions.</li>
            <li>Before submitting your vote, it's crucial to verify your selections because once you submit your vote,
                you cannot change it afterwards.</li>
            <li>You will have up to 3 attempts to cast your vote in case of any failure.</li>
            <li>Once your vote is successfully cast, you will receive a confirmation message.</li>
            <li>For any technical assistance or questions, <a href="voter_contact.php">Contact Us</a> here.</li>
        </ol>
        <form action="voter_login.php" method="post">
            <label class="terms-checkbox">
                <input type="checkbox" id="terms-checkbox" required> I have read all the listed instructions mentioned
                above.
            </label>
            <button type="submit" class="proceed-button">Proceed</button>
        </form>
    </div>

</body>

</html>