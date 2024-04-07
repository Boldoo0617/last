<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn&SignUp</title>
    <link rel="stylesheet" type="text/css" href="./form-style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <!-- login form -->
          <form action="login.php" method = "post" class = "sign-in-form" >
            <h2 class="title">Нэвтрэх</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name = "username" placeholder="Username" minlength="3" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name = "password" placeholder="Password" minlength="8" required/>
            </div>
            <input type="submit" value="нэвтрэх" class="btn solid" />
          </form>

          <!-- burtgeliin form -->
          <form action="register.php" method = "post" class="sign-up-form">
            <h2 class="title">Бүртгүүлэх</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name = "username" placeholder="Username"  minlength="3" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name = "firstname" placeholder="Firstname" minlength="3" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name = "lastname" placeholder="Lastname"  minlength="2" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name = "phone" placeholder="Phone"  minlength="8" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="password" name = "password" placeholder="Password" minlength="8" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="password" name = "repassword" placeholder="Password" minlength="8" required/>
            </div>
            <input type="submit" value="бүртгүүлэх" class="btn solid" />
          </form>
          


            <?php if(isset($errorMessage)) { ?>
                <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php } ?>

            <?php if(isset($successMessage)) { ?>
                <p style="color: green;"><?php echo $successMessage; ?></p>
            <?php } ?>
            


        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <p>Бүртгэлтэй хаяг байхгүй юу?.</p>
                <button class="btn transparent" id="sign-up-btn">Бүртгүүлэх</button>
            </div>
            <img src="./img/logo.svg" class="image" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <p>Таньд бүртгэлтэй хаяг байгаа юу ?</p>
                <button class="btn transparent" id="sign-in-btn">Нэвтрэх</button>
            </div>
            <img src="./img/logo.svg" class="image" alt="">
        </div>
      </div>
    </div>

    <script src="./app.js"></script>
  </body>
</html>
