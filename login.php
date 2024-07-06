<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    <?php
    include 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            $email = $row['email'];
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                session_start();
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;

                echo '<script>Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Logined Sucessfully",
                    showConfirmButton: false,
                    timer: 1500
                });
            
                setTimeout(() => {
                    window.location.href = "sucess.php";
                }, 1500);
                </script>';
            } else {
                echo '<script>Swal.fire({
                    position: "top-center",
                    icon: "error",
                    title: "Incorrect Password",
                    showConfirmButton: false,
                    timer: 1500
                });
            
                setTimeout(() => {
                    window.location.href = "index.html";
                }, 1500);
                </script>';
            }
        } else {
            echo '<script>Swal.fire({
                position: "top-center",
                icon: "info",
                title: "Account Not Found",
                text: "Please Register to Login",
                showConfirmButton: false,
                timer: 1500
            });
        
            setTimeout(() => {
                window.location.href = "register.html";
            }, 1500);
            </script>';
        }
        $conn->close();
    }
    ?>
</body>

</html>


