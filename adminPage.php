<?php


require_once 'conn.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>








    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>users record</h3>
                <hr />
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>ID</th>
                            <th>username</th>
                            <th>email</th>
                            <th>password</th>
                            <th>last login</th>
                            <th>date created</th>


                            <th>Update</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php

                            // If Session["user"] == null, redirect to the login page, else continue. use get

                            $sql = "SELECT * FROM users";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            foreach ($results as $result) {
                                if ($result->email == 'jaffardawahreh2@gmail.com') {
                                    continue;
                                }
                            ?>
                                <!-- Display Records -->
                                <tr>
                                    <td><?php echo ($result->ID); ?></td>
                                    <td><?php echo ($result->username); ?></td>
                                    <td><?php echo ($result->email); ?></td>
                                    <td><?php echo ($result->password); ?></td>
                                    <td><?php echo ($result->last_Login_Date); ?></td>
                                    <td><?php echo ($result->dateCreated); ?></td>


                                    <td> <a href="editUser.php?id=<?php echo ($result->ID); ?>"><button class="btn btn-info btn-s"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                    <td><a href="RemoveUser.php?del=<?php echo ($result->ID); ?>"><button class="btn btn-danger btn-s" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                </tr>





                            <?php
                                // for serial number increment
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="index.php" class="btn btn-danger mt-4">Logout</a>

    </div>











</body>

</html>