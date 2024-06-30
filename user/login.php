<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPMS | Login</title>

        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="bg-image"></div>
        <section class="login">
            <h1>Staff Payroll System</h1>
            <form action="action_page.php" method="post">
                <div class="container">
                    <table>
                        <tr class="uname">
                            <td><label for="uname">Username:</label></td>
                            <td><input class="input" type="text" placeholder="Your username here" name="uname" required></td>
                        </tr>
                        <tr class="passw">
                            <td><label for="psw">Password:</label></td>
                            <td><input class="input" type="password" placeholder="Your password here" name="psw" required></td>
                        </tr>
                    </table>
                    <span class="psw"><a href="#">Forgot password ?</a></span>
                    <button type="submit">Login</button>
                </div>
            </form>
        </section>
    </body>

</html>
