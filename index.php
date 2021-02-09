<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liana Technologies</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
  
    <h2>Email Collection System</h2>
    <!-- Form to collect email data -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <div class="container">
        <div class="title">Email:</div>
        <input type="text" name="email" required="required" /> 

        <!-- prevent multiple submitions in onclick-->
        <input type="submit" onclick="this.disabled=true; this.value='Sending, please wait...'; this.form.submit();"

      </div>
    </form>

</body>

</html>


<?php
include 'databaseConnection.php';
include_once("constants.php");

// check for email field data and request_method
if(!empty($_POST['email']) && $_SERVER["REQUEST_METHOD"] == "POST" ){

  // Validate email
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo '<div class="message error-message">Email address is invalid.</div>';;
  } else {

    $conn = OpenDBConnection();
    // encapsulate email into a string. prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    if ($conn->connect_error) {
      die("Connection failed. Please try again later.");
    }

    // insert email in to emaildata table 
    $sql = sprintf("INSERT INTO %s (email) VALUES ('$email')", TABLE_NAME);
    

    // success and error messages display
    if ($conn->query($sql) === TRUE) {
      echo '<div class="message success-message">Email added successfully.</div>';
      
    } else {
      echo '<div class="message ssage">Sorry there was an error. Please try again.</div>';
    }
    // reset the email field redirected to success.php
    unset($email);
    header("Location: success.php");

    CloseDBConnection($conn);
  }
}

?>