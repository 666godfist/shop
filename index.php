<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
    <style>
        .d1
        {
            background: purple;
            height: 800px;
            width: 500px;
            border: 50%;
            outline: 5px black solid;
            font-size: 20px;
            text-align: center;
            color: white;
        }
        input
        {
            background: lightgrey;
        }
        button
        {
            background: lightgrey;
        }
        </style>
</head>
<body>
<?php
        session_start();
        echo '<form method="POST">';
        echo '<center><div class="d1"><h1>Logowanie:</h1><br> Nazwa Użytkownika: <input name="login"><br> Haslo: <input name="password" type="password"><br><input type="submit">';
        echo '</form>';
        echo '<form action="rejestracja.php"><button>Rejestracja</button></form></center></div>';
        print_r($_POST);
        if(isset($_POST["login"]) && isset($_POST["password"])){
            $user_password = $_POST["password"];
            $user_name = $_POST["login"];
            $con = new mysqli("127.0.0.1","root","", "sklep-zsp");
            
            $query_login = $con->query("SELECT * FROM users WHERE name ='$user_name' AND password='$user_password'");
            $res = $query_login->fetch_array();
            
            if(count($res) > 0) {
                $_SESSION["current_user"] = $res['id'];
            }
            if (isset($_SESSION["current_user"])){
                echo 'udalo sie zalogowac';
                header("location: strona.php");
                /* Użytkownik jest zalogowany */
             } else {
                /* Użytkownik nie jest zalogowany */
                header("location: strona.php");
             }
          }
        // $con = new mysqli("127.0.0.1","root","","sklep-zsp");
        // echo '<form method="POST">';
        // $res = $con->query("SELECT * FROM users WHERE password='".$_POST['password']."' AND name='".$_POST['login']."'");
        // $cos = $res->fetch_all();

        // echo '<center><div class="d1"><h1>Logowanie:</h1><br> Nazwa Użytkownika: <input name="login"><br> Haslo: <input name="password" type="password"><br><input type="submit">';
        
        // if($_POST!=NULL)
        // {
        //     for($i=0;$i<count($cos);$i++)
        //     {
        //         if($_POST['login']==$cos[$i][1] && $_POST['password']==$cos[$i][2])
        //         {
        //             $_SESSION["login"] = $_POST['login'];
        //             $_SESSION["id"] = $i;
        //             echo 'udalo sie zalogowac';
        //             header("Location: strona.php");
        //         }
        //     }

        // }
        // echo '</form>';
    ?>
    <?php
        //echo '<form action="rejestracja.php"><button>Rejestracja</button></form></center></div>';
    ?>
</body>
</html>