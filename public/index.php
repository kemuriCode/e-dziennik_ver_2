<?php
@include_once "./users/teacher.php";
@include_once  "./users/student.php";
//@include_once  "./errors.php";
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>e-dziennik Strona logowania</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="./assets/css/form-elements.css">
        <link rel="stylesheet" href="./assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="./assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>e</strong>-dziennik</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Zaloguj się na swój profil</h3>
                            		<p>Podaj swoją nazwę użytkownia oraz hasło aby przejść dalej:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="index.php" method="post" class="login-form">
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Rodzaj użytkownika</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="type">
                                            <option selected>Wybierz...</option>
                                            <option value="1">Nauczyciel</option>
                                            <option value="2">Uczeń</option>
                                        </select>
                                    </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="form-username" placeholder="Nazwa użytkownia..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Hasło..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Zaloguj się!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="./assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>

<?php

$connect=new PDO('mysql:host=localhost;dbname:szkola; port=3306','root','');
$connect->query('SET NAMES UTF8');
$connect->query('SET CHATACTER_SET utf_polish_ci');

if(isset($_POST['form-username']) && isset($_POST['form-password']) && isset($_POST['type']))
{
    $show=$connect->prepare('select * from uzytkownik where login="'.$_POST['form-username'].'" && haslo="'.sha1($_POST['form-password']).'" && rodzaj="'.$_POST['type'].'"');
    $show->execute();

    $login=$_POST['form-username'];
    $password=$_POST['frm-password'];

    $inquiry_results=$show->rowCount();

    if($inquiry_results==1 && $_POST['type']=="1")
    {
        SESSION_START();
        $result=$show->fetch(PDO::FETCH_ASSOC);
        $_SESSION['login_session']=$result;
        header('Location:./users/teacher.php');
    }
    else
        if($inquiry_results==1 && $_POST['type']=="2")
        {
            SESSION_START();
            $result=$show->fetch(PDO::FETCH_ASSOC);
            $_SESSION['login_session']=$result;
            header('Location:./users/students');
        }
        else
        {
            echo '<script type="text/javascript">
					alert("Wprowadzono niepoprawny login lub/i hasło lub/i typ konta...");
					</script>';
        }
}