<?php 
    include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <form action="contactLogic.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="5" required></textarea><br>

            <input type="submit" value="Send">
        </form>
    </div>
</body>
</html>
<?php 
    include_once('footer.php');
?>
