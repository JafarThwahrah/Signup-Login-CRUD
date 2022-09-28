
<?php
require_once 'conn.php';

if (isset($_POST['signupformbtnname'])) {





    $username = $_POST['usrname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $photo = "./personalPhotos/" . $_POST['photo'];
    $json_arr = array($username, $email, $password, $cpassword);


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
    
    session_start();
    $_SESSION['email'] = $email;    
    require_once 'conn.php';
    lastLogin($email, $conn);
    $sql = "SELECT `ID` FROM `users` WHERE email = :email";
    $query = $conn->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $newuserid = $results[0]['ID'];
    // var_dump($results);



    // echo "<script>window.location.href='userpage.php?vid=$newuserid'</script>";
}







?>




