<html>
<head>
    <title>Liana Technologies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Registration Page</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <div class="container">
        <div class="title">Email:</div>
        <input type="text" name="email" required="required" /> 
        <!-- prevent multiple submitions -->
        <input type="submit" onclick="this.disabled=true; this.value='Sending, please wait...'; this.form.submit();"

      </div>
    </form>

</body>
</html>

<?php
include 'databaseConnection.php';

if(!empty($_POST['email']) && $_SERVER["REQUEST_METHOD"] == "POST" ){
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo '<div class="error-message">Email address is invalid.</div>';;
  } else {
    $conn = OpenCon();
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    if ($conn->connect_error) {
      die("Connection failed. Please try again later.");
    }

      $sql = "INSERT INTO emaildata (email) VALUES ('$email')";

      if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Email added successfully.</div>';
      
      } else {
        echo '<div class="error-message">Sorry there was an error. Please try again.</div>';
      }
    unset($email);
    header("Location: lianatechnologies/success.php");
    CloseCon($conn);
  }
}

?>