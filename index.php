<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <img src="img/car-logo.png" class="logo" alt="Logo">
            <div class="social">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </nav>
    </header>

    <div class="hero">
        <div class="text">
            <h4>Pilihan Terbaik, Untuk Setiap</h4>
            <h1>Perjalanan <br> <span>Anda</span></h1>
            <p>Real Poise, Real Power, Real Perfomance.</p>
            <button class="btn" id="loginBtn">LOGIN SEKARANG</button>
        </div>
    </div>

    <!-- Modal Login -->
    <div id="loginPopup" class="login-popup">
        <div class="login-container">
            <span id="closeBtn" class="close-btn">&times;</span>
            <h2>LOGIN</h2>
			<form id="loginForm" method="POST" action="login.php">
                <div class="input-container-username">
                    <input type="text" id="username" name="username" placeholder=" " required>
                    <label for="username">Username</label>
                </div>
                <div class="input-container-password">
                    <input type="password" id="password" name="password" placeholder=" " required>
                    <label for="password">Password</label>
                </div>
                <div class="forgot-password">
                    <a href="#" id="forgotPassword">Forgot Password?</a>
                </div>
                <div class="action-buttons">
                    <button type="submit" class="login-btn">Login</button>
                    <div class="links">
                      <p>Don't Have An Account ? <a href="#" id="registerAccount">Register Now</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
	
<!-- Modal Register -->
<div id="registerPopup" class="login-popup">
    <div class="login-container">
        <span id="closeBtnRegister" class="close-btn">&times;</span>
        <h2>REGISTER</h2>
		<form id="registerForm" method="POST" action="register.php">
            <div class="input-container-username">
                <input type="text" id="name" name="name" placeholder=" " required>
                <label for="name">Username</label>
            </div>
            <div class="input-container-username">
                <input type="tel" id="phone" name="phone" placeholder=" " required>
                <label for="phone">Nomor HP</label>
            </div>
			 <div class="input-container-username">
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <div class="input-container-password">
                <input type="password" id="password2" name="password2" placeholder=" " required>
                <label for="password2">Password</label>
            </div>
            <div class="input-container-password">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder=" " required>
                <label for="confirmPassword">Confirm Password</label>
            </div>
            <div class="action-buttons">
                <button type="submit" class="login-btn">Register</button>
				<div class="links">
                    <p>Already Create Account ? <a href="#" id="loginAccount">Login</a></p>
                </div>
            </div>
        </form>
    </div>
</div>
    <script src="script.js"></script>
</body>
</html>
