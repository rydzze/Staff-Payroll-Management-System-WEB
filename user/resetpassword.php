<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Reset Password</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="bg-image"></div>

    <section class="login">
        <h1>Reset Password</h1>

        <form action="includes/resetpassword.php" method="post">
            <div class="container">
                <table>
                    <tr class="uname">
                        <td><label for="new_password">Enter new password:</label></td>
                        <td><input class="input" type="password" id="new_password" placeholder="Your new password" name="new_password" required></td>
                    </tr>
                    <tr class="checkbox">
                        <!-- An element to toggle between password visibility -->
                        <td></td>
                        <td colspan='2'>Show password<input type="checkbox" onclick="myFunction1()"></td>
                    </tr>
                    <tr class="uname">
                        <td><label for="confirm_password">Confirm new password:</label></td>
                        <td><input class="input" type="password" id="confirm_password" placeholder="Confirm new password" name="confirm_password" required></td>
                    </tr>
                    <tr class="checkbox">
                        <!-- An element to toggle between password visibility -->
                        <td></td>
                        <td colspan='2'>Show password<input type="checkbox" onclick="myFunction2()"></td>
                    </tr>
                </table>
                <input type="submit" id="submitButtonVerify" name="login" value="Submit">
            </div>
        </form>
    </section>
    <script src="js/script.js"></script>
</body>

</html>