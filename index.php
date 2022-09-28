<?php
require_once 'conn.php';
require_once 'login.php';
require_once 'register.php';
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


  <!-- <iframe src="https://www.google.com/maps/d/embed?mid=1tBjC-fbUxUMJ_P1xIMsSQw4toVH52z8&ehbc=2E312F" width="640" height="480"></iframe> -->







  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

  <!-- JavaScript Bundle with Popper -->

</body>

</html>