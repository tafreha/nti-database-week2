<?php 

require 'dbConnection.php';

$sql = "select id, title , content , image from data";

$data = mysqli_query($con,$sql); 


?>


<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>
            <br>



        </div>

              <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
            <th>id</th>
                <th>title</th>
                <th>content</th>
                <th>image</th>
                <th>action</th>
            </tr>



    <?php 
    
         while($raw = mysqli_fetch_assoc($data)){

    ?>

            <tr>
            <td><?php echo $raw['id'];?></td>
            <td><?php echo $raw['title'];?></td>
            <td><?php echo $raw['content'];?></td>
            <td><?php echo $raw['image'];?></td>
                <td>
                <a href="remove.php?id='.$raw['id'].'"  class='btn btn-danger m-r-1em'>Delete</a>
            </td>

            </tr>
<?php } 



mysqli_close($con);

?>

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>