<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)";

        $insertQuery = $conn->prepare($sql);

        $insertQuery->bindParam(":name", $name);
        $insertQuery->bindParam(":email", $email);
        $insertQuery->bindParam(":message", $message);

        if ($insertQuery->execute()) {
            echo "<script>
                alert('Your message has been sent successfully. We will get back to you soon!');
                window.location.href = 'home.php';
            </script>";
            exit(); // Ensure no further code is executed after redirection
        } else {
            echo "<script>
                alert('Oops! Something went wrong and we couldn\'t get your message.');
                window.history.back();
            </script>";
        }

    } else {
        echo "<script>
            alert('All fields are required!');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Form not submitted!');
        window.history.back();
    </script>";
}
?>
