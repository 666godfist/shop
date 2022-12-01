<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynik</title>
    <style>
        .d1
        {
            background: purple;
            height: 500px;
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
        $con = new mysqli("127.0.0.1","root","","sklep-zsp");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM users");
        $cos = $res->fetch_all();

        echo '<center><div class="d1"><h1>Rejestracja:</h1><br> Nazwa Użytkownika: <input name="login"><br> Haslo: <input name="password" type="password"><br><input type="submit">';
        if($_POST!=NULL)
        {
            if($_POST['login']!="" && $_POST['password']!="")
            {
                $sqlquery = "INSERT INTO `users` VALUES ('".count($cos)."', '".$_POST['login']."', '".$_POST['password']."', '0', '');";
                $con->query($sqlquery);
                header('location: index.php');
            }
        }
        echo '</form>';

        echo '<form action="index.php"><button>Logowanie</button></form></center></div>';
    ?>
</body>
</html>