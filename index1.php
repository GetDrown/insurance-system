<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Insurance System</title>
</head>

<body>
    <div class="container" id="container">
        <!-- staff -->
        <div class="form-container sign-up">
            <form method="POST" action="">
                <h1>Login as Staff</h1>
                <span>use your provided account to login</span>
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <button>Login</button>
            </form>
        </div>
        <!-- admin -->
        <div class="form-container sign-in">
            <form method="POST" action="login-logic.php">
                <h1>Login as Administrator</h1>
                <span>use your provided account to login</span>
                <input type="text" placeholder="Username" name="email">
                <input type="password" placeholder="Password" name="password">
                <button>Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back! Admin</h1>
                    <p>Login to your account as Administrator to proceed</p>
                    <button class="hidden" id="login">Administrator</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back! Staff</h1>
                    <p>Login to your account as staff to proceed</p>
                    <button class="hidden" id="register">Staff</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/login.js"></script>
</body>

</html>