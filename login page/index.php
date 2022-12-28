<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Selamat Datang di Website Kami</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="loginMultiUser.php" method="post" class="sign-in-form">
            <h2 class="title">Masuk</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Masuk" class="btn solid" />
            <p class="social-text">Atau masuk dengan</p>
            <div class="social-media">
              <a href="https://id-id.facebook.com/" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com/" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://www.google.com/accounts/" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="https://id.linkedin.com/" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="regisProses.php" method="get" class="sign-up-form">
            <h2 class="title">Daftar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Daftar" />
            <p class="social-text">Atau daftar dengan</p>
            <div class="social-media">
              <a href="https://id-id.facebook.com/" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com/" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://www.google.com/accounts/" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="https://id.linkedin.com/" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Belum punya akun ?</h3>
            <p>
              Yuk, daftar disini dan segera menjadi bagian dari kami!!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Daftar
            </button>
          </div>
          <img src="img/login.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sudah punya akun ?</h3>
            <p>
              Masuk lewat sini ya!!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Masuk
            </button>
          </div>
          <img src="img/register.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
