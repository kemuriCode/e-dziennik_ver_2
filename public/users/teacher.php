<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-dziennik Strona logowania</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href=".././assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href=".././assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href=".././assets/css/form-elements.css">
    <link rel="stylesheet" href=".././assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href=".././assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href=".././assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href=".././assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href=".././assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href=".././assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
<!-- Top content -->
<div class="top-content">
    <div class="inner-bg">
        <div class="container">

            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Nauczyciel</a>
            </nav>
            <div class="jumbotron">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Klasa</th>
                            <th>Ilość punktów</th>
                        </tr>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Klasa</th>
                            <th>Ilość punktów</th>
                        </tr>
                        </tfoot>
                        <?php

                        $servername = "localhost";
                        $username = "root";
                        $password = "Amsterdam.1";
                        $dbname = "szkola";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = 'SELECT * from uzytkownik';
                        $type = 'SELECT * from rodzaj';

                        if (mysqli_query($conn, $sql)) {
                            echo "";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        $count = 1;

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0 && $type != ['nauczyciel']) {

                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tbody>
                                <tr>
                                    <th>
                                        <?php echo $row['id']; ?>
                                    </th>
                                    <td>
                                        <?php echo $row['imie']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nazwisko']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['klasa']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['przedmiot']; ?>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                                $count++;
                            }
                        } else {
                            echo '0 results';
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="row centered-form">
                    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Dodaj
                                    <small>ucznia...</small>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="first_name" id="first_name"
                                                       class="form-control input-sm" placeholder="Imię">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" id="last_name"
                                                       class="form-control input-sm" placeholder="Nazwisko...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="login" id="login" class="form-control input-sm"
                                               placeholder="Login">
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="password" id="password"
                                                       class="form-control input-sm" placeholder="Hasło">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" value="Register" class="btn" name="reg_user">Dodaj</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript -->
<script src=".././assets/js/jquery-1.11.1.min.js"></script>
<script src=".././assets/bootstrap/js/bootstrap.min.js"></script>
<script src=".././assets/js/jquery.backstretch.min.js"></script>
<script src=".././assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src=".././assets/js/placeholder.js"></script>
<![endif]-->


</body>

</html>

<?php
// REGISTER USER

if (isset($_POST['reg_user'])) {

// receive all input values from the form

    $username = mysqli_real_escape_string($db, $_POST['login']);

    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);

    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);

    $password = mysqli_real_escape_string($db, $_POST['password']);


// form validation: ensure that the form is correctly filled ...

// by adding (array_push()) corresponding error unto $errors array

    if (empty($username)) {
        array_push($errors, "Login is required");
    }

    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

// first check the database to make sure

// a user does not already exist with the same username and/or email

    $user_check_query = "SELECT * FROM uzytkownik WHERE ='$username'";

    $result = mysqli_query($db, $user_check_query);

    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists

        if ($user['login'] === $username) {

            array_push($errors, "Login already exists");

        }
    }

// Finally, register user if there are no errors in the form

    if (count($errors) == 0) {

        $password = md5($password);//encrypt the password before saving in the database

        echo $password;

        $query = "INSERT INTO uzytkownik(login, imie, nazwisko, haslo) VALUES('$username','$first_name', '$last_name' '$password')";

        mysqli_query($db, $query);

        $_SESSION['login'] = $username;

        $_SESSION['success'] = "You are now logged in";

        header('location: login.php');

    }
}

// ...