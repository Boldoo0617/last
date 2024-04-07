<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style>
    .title {
      text-align: center;
      font-size: 30px; /* Example font size */
      color: #333; /* Example color */
      margin-top: 10px; /* Example top margin */
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    .sign-up-form {
      max-width: 400px;
      margin: 50px auto;
      background: #fff;
      padding: 60px;
      border-radius: 10px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3);
      display: flex;
      flex-direction: column;
    }
    .sign-up-form h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .input-field {
      margin-bottom: 25px;
    }
    .input-field i {
      top: 50%;
      transform: translateY(-50%);
      color: #aaa;
    }
    .input-field input, .input-field select {
      width: 89%;
      padding: 15px 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      outline: none;
      font-size: 16px;
    }
    .input-field input:focus, .input-field select:focus {
      border-color: #007bff;
    }
    .drop{
      margin-bottom: 25px;
      width: 89%;
      top: 50%;
      transform: translateY(-50%);
      color: #aaa;
      padding: 15px 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      outline: none;
      font-size: 16px;
      border-color: #007bff;

    }
    .btn {
      width: 100%;
      background: #007bff;
      border: none;
      padding: 15px;
      border-radius: 5px;
      cursor: pointer;
      color: #fff;
      font-size: 18px;
      transition: background 0.3s ease;
    }
    .btn:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
          <!-- burtgeliin form -->
          <form action="delete.php" method = "post" class="sign-up-form">
            <h2 class="title">БАРАА ХАСАX</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name = "name" placeholder="барааны нэр"  minlength="3" required/>
            </div>
            <input type="submit" value="Хасах" class="btn solid" />
            
          </form>
  </body>
</html>
