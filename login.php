<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Transparent background */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(cafe.jpg) no-repeat;
            background-size: cover;
            background-position: center;
            margin: auto;
        }

        /* Centered form */
        .login-form {
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
            max-width: 400px;
            /* Limit width for better readability */
            width: 100%;
            /* Take full width */
            text-align: center;
        }

        /* Input fields */
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            /* Light gray border */
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Login button */
        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: black;
            /* Blue color */
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Login button hover effect */
        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }
    </style>
</head>

<body>

    <div class="login-form">
        <h2>Login</h2>
        <input type="text" name="email" placeholder="User" id="email" required><br>
        <input type="password" name="password" placeholder="Password" id="password" required><br>
        <input type="submit" class="loginbtn" value="Log-in" onclick="validationAdmin()"><br>
    </div>

</body>

</html>


<script>
    function validationAdmin() {
        event.preventDefault();
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        if (email === "admin" && password === "admin") {
            alert("Login Sucess!");
            window.location.href = 'ad.php';
        } else {
            alert("Login failed. Please check your email and password.");
        }
    }
</script>