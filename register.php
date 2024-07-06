<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    <?php
    include 'config.php';
    include 'Dotenv.php';
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y');
        $time = date('h:i');

        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $mobile = trim($_POST["mobile"]);
        $password = trim($_POST["password"]);
        $confirm_password = trim($_POST["confirm_password"]);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;

            $mail->Username   = $xxxx;
            $mail->Password   = $yyyy;

            $xxxx = 'xxxxxx@gmail.com';
            $yyyy = 'xxxxxxxxxxxxxxxx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('mothilal2328@gmail.com', 'Jack');
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Registration Successful';
            $mail->Body    = "Hii $name,<br><br>Thank you for registering on our site.";

            $mail->send();
            $sql = "INSERT INTO users (name, email, mobile, password,login_date,login_time) VALUES ('$name','$email','$mobile','$hashed_password','$date','$time')";
            $res = mysqli_query($conn, $sql);
            $res = "Email has been sent.";

            echo '<script>Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Registered Sucessfully",
                showConfirmButton: false,
                timer: 1500
            });
        
            setTimeout(() => {
                window.location.href = "index.html";
            }, 1500);
            </script>';
        } catch (Exception $e) {
            $res = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        // echo $res;
        $conn->close();
    }

    ?>
</body>

</html>