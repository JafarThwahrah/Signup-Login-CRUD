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
      // echo ($result['password']);
      // echo $password;

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




<?php
if (isset($_POST['signupformbtnname'])) {
  require_once 'conn.php';





  $username = $_POST['usrname'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $photo = "./personalPhotos/" . $_POST['photo'];



  function lastLogin($email, $conn)
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
    date_default_timezone_set('Asia/Amman');
    $date = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("UPDATE users SET last_Login_Date = :lastlogin  WHERE email = :em");


    $stmt->bindParam(':lastlogin', $date);
    $stmt->bindParam(':em', $email);

    $stmt->execute();
  }








  $sql = "SELECT * FROM users";
  $query = $conn->prepare($sql);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);

  foreach ($results as $result) {

    if ($result->email == $email) {

      echo ("<script>alert('Your Email is already registered, try another one');</script>" . "<script>window.location.href='index.php'</script>");
    }
  }

  $sql = "INSERT INTO `users` (`username`, `email`, `password`, `photo`) VALUES (:n, :e,:p,:ph)";

  $query = $conn->prepare($sql);

  $query->bindParam(':n', $username, PDO::PARAM_STR);
  $query->bindParam(':e', $email, PDO::PARAM_STR);
  $query->bindParam(':p', $password, PDO::PARAM_STR);
  $query->bindParam(':ph', $photo, PDO::PARAM_STR);




  $query->execute();
  require_once 'conn.php';
  lastLogin($email, $conn);
  $_SESSION['email'] = $email;
  $sql = "SELECT `ID` FROM `users` WHERE email = :email";
  $query = $conn->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_ASSOC);
  $newuserid=$results[0]['ID'];
  // var_dump($results);



  echo "<script>window.location.href='userpage.php?vid=$newuserid'</script>";
}







?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <title>Document</title>
</head>

<body>


  <!-- Signup Modal -->

  <form name="regForm" id="signUpForm" method="POST">


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Sign up</h3>
            <hr>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">



            <div class="form-floating mb-3">
              <input type="text" class="form-control" pattern="[a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+" name="usrname" id="username" placeholder="username">
              <label for="username">Username</label>
            </div>


            <!-- An <input> element with type="email" that must be in the following order: characters@characters.domain (characters followed by an @ sign, followed by more characters, and then a "."

After the "." sign, add at least 2 letters from a to z -->

            <div class="form-floating mb-3">
              <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="email" placeholder="name@example.com">
              <label for="email">Email address</label>
            </div>

            <!-- password Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters -->
            <div class="form-floating">
              <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" name="pass" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>

            <div class="form-floating mt-3">
              <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="cpass" id="cpassword" placeholder="Confirm Password">
              <label for="cpassword">Confirm Password</label>
            </div>

            <div class="mt-2">
              <label for="formFile" class="form-label">Personal Photo</label>
              <input class="form-control" name="photo" type="file" id="formFile">
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" value="Signup" name="signupformbtnname" id="Signupformbtn" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>

  </form>




  <!-- Login Modal -->




  <form action="" method="POST">


    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">login</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">



            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="loginemail" id="loginemail" placeholder="name@example.com">
              <label for="loginemail">Email address</label>
            </div>


            <div class="form-floating">
              <input type="password" class="form-control" name="loginpassword" id="loginpassword" placeholder="Password">
              <label for="loginpassword">Password</label>
            </div>





          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" value="Login" name="loginform" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>

  </form>
























  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="">Hello There</h3>
          <hr />
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium architecto corporis dolorem quas dolores? Veritatis autem aut natus. Nobis enim quam doloribus, assumenda laboriosam reprehenderit doloremque tempore optio pariatur ipsa.
          </p>
          <img src="./hero-section-photo.png" alt="photo" class="w-50 h-75">
          <br>
          <button type="button" class="btn btn-danger m-1 w-25 rounded-pill " data-bs-toggle="modal" data-bs-target="#exampleModal2">Login</button>
          <br>
          <button type="button" class="btn btn-primary m-1 w-25 rounded-pill " data-bs-toggle="modal" data-bs-target="#exampleModal">Sign up</button>
      </div>
    </div>
  </div>










  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

  <!-- JavaScript Bundle with Popper -->

</body>

</html>