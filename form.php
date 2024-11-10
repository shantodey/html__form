<?php
    $message = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the 'username' and 'password' fields are set in the $_POST array
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        ob_start();
        loginUser($username, $password);
        $message = ob_get_clean();

        // Redirect after form submission to prevent resubmission on refresh
        if (empty($message)) {
            header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to the same page
            exit(); // Stop script execution
        }
    }

    function loginUser($userName, $userPassword) {
        if (userInput($userName)) {
            echo "Wrong username";
        } else if (userPassword($userPassword)) {
            echo "Wrong password";
        } else if (!matching($userName, $userPassword)) {
            echo "Username and password didn't match";
        } else {
            login();
        }
    }

    function userInput($userName) {
        return empty($userName);
    }

    function userPassword($userPassword) {
        return empty($userPassword);
    }

    function matching($userName, $userPassword) {
        return $userName == 'shanto' && $userPassword == 'dey';
    }

    function login() {
        // Redirect to the welcome.html page after login
        header('Location: wellcome.html');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/fav icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/form.css">
    <title>Form</title>
</head>
<body>

<section id="page">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-lg-3 col-md-6 col-sm-8 blur text-center">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row pt-3">
                        <div class="col-12 text-center">
                            <h2 class="text-light">Login</h2>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-12">
                            <div class="form__text">
                                <input type="text" class="form-control amar" id="inputEmail3" placeholder="User Name" name="username" required>
                                <div class="form__icon">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-12">
                            <div class="form__text">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
                                <div class="form__icon">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3 pb-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-light w-100">Sign in</button>
                        </div>
                    </div>
                    <div class="row pt- pb-5">
                        <div class="col-12">
                            <div class="account__text">
                                <p>Don't have an account?</p> 
                                <a href="" target="_blank">Register</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
