<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Admin Login</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="bg-image"></div>

    <section class="login">
        <h1>SPMS | Admin Login</h1>

        <form action="includes/login.php" method="post">
            <div class="container">
                <table>
                    <tr class="uname">
                        <td><label for="uname">Username:</label></td>
                        <td><input class="input" type="text" placeholder="Your username here" name="admin_ID" required></td>
                    </tr>
                    
                    <tr class="passw">
                        <td><label for="psw">Password:</label></td>
                        <td><input class="input" type="password" placeholder="Your password here" name="admin_pwd" required></td>
                    </tr>
                </table>
                
                <input type="submit" id="submitButton" name="login" value="Login">
            </div>
        </form>
    </section>
</body>

</html>
