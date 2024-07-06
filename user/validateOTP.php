<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | OTP Verification</title>

    <link rel="icon" href="img/spms.png" type="image/png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="bg-image"></div>

    <section class="login">
        <h1>OTP Verification</h1>

        <form action="includes/validateOTP.php" method="post">
            <div class="container" id="otpForm">
                <table>
                    <tr class="uname">
                        <td><label for="otp">OTP:</label></td>
                        <td><input class="input" type="text" id="userOTP" placeholder="6 digits OTP code" name="otpinput" required></td>
                    </tr>
                </table>
                
                <input type="submit" id="submitButtonVerify" name="login" value="Verify">
            </div>
        </form>
    </section>
</body>

</html>