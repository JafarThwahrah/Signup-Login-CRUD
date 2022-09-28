<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Patients Management</title>
</head>

<body>

</body>

</html>

<?php
require_once 'conn.php';
$data = ($_REQUEST['id']);
$sql = "SELECT `ID`,`username`,email,`password` from users where ID=:idu";
$query = $conn->prepare($sql);
$query->bindParam(':idu', $data, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
?>
    <h3 class="text-center">Update patient information</h3>
    <form class="container-lg" name="updateform" method="POST">

        <div class="form-floating m-3">
            <input type="text" value="<?php echo ($result->username) ?>" name="username" class="form-control h-25" id="Na" placeholder="Name" required>
            <label for="Na">username</label>
        </div>


        <div class="form-floating m-3">
            <input type="text" name="email" value="<?php echo ($result->email) ?>" class="form-control h-25" id="dd" placeholder="ID" required>
            <label for="dd">email</label>
        </div>


        <div class="form-floating m-3">
            <input type="text" value="<?php echo ($result->password) ?>" name="password" class="form-control h-25" id="ag" placeholder="Age" required>
            <label for="ag">password</label>
        </div>

        <input class="btn btn-primary mt-4" name="update" type="submit" value="update">
        <a href="adminPage.php" class="btn btn-outline-dark mt-4">Cancel</a>


    </form>



<?php
}
?>


<?php
// $data = ($_REQUEST['id']);
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];




    $sql = "UPDATE `users` SET `username` =:n,`email` =:em, `password` =:pas WHERE `users`.`ID` =:iddd";
    $query = $conn->prepare($sql);

    $query->bindParam(':n', $username, PDO::PARAM_STR);
    $query->bindParam(':em', $email, PDO::PARAM_STR);
    $query->bindParam(':pas', $password, PDO::PARAM_STR);
    $query->bindParam(':iddd', $data, PDO::PARAM_STR);



    $query->execute();




    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='adminPage.php?admID=2'</script>";
}



?>