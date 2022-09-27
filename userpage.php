<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>





<?php
require_once 'conn.php';

$View = $_REQUEST['vid'];

$sql = "SELECT * FROM users WHERE ID = :viewID";

$query = $conn->prepare($sql); 
    $query->bindParam(':viewID', $View, PDO::PARAM_INT);
    $query->execute();
    //Assign the data which you pulled from the database (in the preceding step) to a variable.
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    // For serial number initialization
    $cnt = 1;
    if ($query->rowCount() > 0) {
    ?>
        <div class="d-flex justify-content-around mt-5 flex-wrap align-content-around">
            <?php
            //In case that the query returned at least one record, we can echo the records within a foreach loop:
            foreach ($results as $result) {
                echo $result->photo;
            ?>
                <!-- Display card -->

                <div class="card w-25 m-5">
                    <img src="<?php echo ($result->photo); ?>" class="card-img-top" alt="...">
                    
                    <div class="card-body">
                        <h5 class="card-title"> username:<?php echo ($result->username); ?></< /h5>
                            <h5 class="card-title">ID: <?php echo ($result->ID); ?></< /h5>
                                <p class="card-text">email : <?php echo ($result->email); ?></p>
                                <p class="card-text">Creation time : <?php echo ($result->dateCreated); ?></p>


                    </div>
                 

                </div>


        <?php
                // for serial number increment
                $cnt++;
            }
        } ?>
        </div>

    <a href="index.php" class="btn btn-danger mt-4">Logout</a>




</body>

</html>