<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
    <!--<title> Login </title>-->
    <link rel="stylesheet" href="stylingg.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <link rel="stylesheet" href="stylingg.css">
<div class="navbar">
  <h2>E-LEARNING SMK IBU KARTINI</h2>
  <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </div>

<div class="forming">
<img src="file/smika.jpg" alt="">
  <article>
    <br><h1>Welcome to</h1>
    <p>E - Learning SMK Ibu Kartini</p> </br>
    <div class="container">
        <input type="checkbox" id="flip" hidden>
        <div class="cover">
          <div class="front">

          </div>
          <div class="back">
          </div>
        </div>
        <div class="forms">
            <div class="form-content">
              <div class="login-form">
                <div class="title">Login</div>
              <form action="sistem/login.php" method="post">
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Enter your email" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Enter your password" required>
                  </div>
                  <div class="text"><a href="#">Forgot password?</a></div>
                  <div class="button input-box">
                    <input type="submit" value="Sumbit">
                  </div>
                  <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
                </div>
            </form>
          </div>
            <div class="signup-form">
              <div class="title">Signup</div>
            <form action="sistem/signup.php" method="post">
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Enter your name" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" name="id" placeholder="Enter your id" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Enter your email" required>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Enter your password" required>
                  </div>
                  <div class="input-box">
                    <input type="radio" id="guru" name="role" value="teacher" required>
                    <label for="guru">Guru</label><br>
                    <input type="radio" id="murid" name="role" value="student" required>
                    <label for="murid">Murid</label><br>
                  </div>
                  <div class="button input-box">
                    <input type="submit" value="Sumbit">
                  </div>
                  <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                </div>
          </form>
        </div>
        </div>
        </div>
      </div>
  </article>
</div>
</body>
</html>