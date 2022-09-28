<?php

require_once 'conn.php';
session_start();

if (isset($_POST['loginform'])) {
  require_once 'conn.php';

  $email = $_POST['loginemail'];
  $password = $_POST['loginpassword'];

  $sql = "SELECT * FROM `users` WHERE email = :em";

  $query = $conn->prepare($sql);

  $query->bindParam(':em', $email, PDO::PARAM_STR);

  $query->execute();


  function lastLogin($email)
  {

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "signup_login";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully" . "<br>";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }


    $stmt = $conn->prepare("UPDATE users SET last_Login_Date = :lastlogin  WHERE email = :em");

    date_default_timezone_set('Asia/Amman');
    $date = date('Y-m-d H:i:s');

    $stmt->bindParam(':lastlogin', $date);
    $stmt->bindParam(':em', $email);

    $stmt->execute();
  }





  $results = $query->fetchAll(PDO::FETCH_OBJ);
  function checkusers($email, $password, $results)
  {

    foreach ($results as $result) {
      require_once 'conn.php';


      if ($result->password == $password && $result->email == $email && $result->email == 'jaffardawahreh2@gmail.com') {
        lastLogin($email);
        $_SESSION['email'] = $email;

        return ("<script>alert('Welcome Jafar Thwahrah');</script>" . "<script>window.location.href='adminPage.php'</script>");
      } else if ($result->password == $password && $result->email == $email) {
        require_once 'conn.php';
        $_SESSION['email'] = $email;
        lastLogin($email);
        function_alert($result->username);
        return ("<script>window.location.href='userpage.php?vid=$result->ID'</script>");
      }
    }
    return ("<script>alert('Wrong username or password');</script>" . "<script>window.location.href='index.php'</script>");
  }


  echo checkusers($email, $password, $results);
}

function function_alert($message)
{

  echo "<script>alert('Weclome $message');</script>";
}






?>