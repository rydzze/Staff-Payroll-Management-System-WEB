<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Forgot Password</title>

    <link rel="icon" href="img/spms.png" type="image/png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="bg-image"></div>

    <section class="login">
        <h1>Forgot Password</h1>
        <form action="includes/forgotpassword.php" method="post">
            <div class="container">
                <table>
                    <tr class="uname">
                        <td><label for="uname">Username:</label></td>
                        <td><input class="input" type="text" placeholder="Your username here" name="usr_ID" required></td>
                    </tr>
                </table>
                <input type="submit" id="submitButtonForgot" name="login" value="Send Link">
            </div>
        </form>
    </section>
</body>

</html>