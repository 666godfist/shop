<html>
    <head>
        <style>
        .d1
        {
            background: purple;
            height: 800px;
            width: 500px;
            border: 5px solid black;
            border-radius: 50px;
            font-size: 20px;
            text-align: center;
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
        <center>
    <?php
    session_start();
    $con = new mysqli("127.0.0.1","root","","sklep-zsp");
    echo '<form method="POST">';
    // $res = $con->query("SELECT * FROM users");
    // $cos = $res->fetch_all();

    $res1 = $con->query("SELECT * FROM offerts WHERE id=$_GET['offer_id']");
    $cos1 = $res1->fetch_all();
    echo '<center><div class="d1"> Zalogowany jako: '.$_SESSION["current_user"].'<h1>Wystaw:</h1><br> Nazwa przedmiotu: <input name="name"><br> Opis: <input name="description"><br><input type="submit">';

    if(isset($_POST['name']))
    {
            $sqlquery = "UPDATE offerts SET `offerts` (id,name,description,users_id,buyer_id) VALUES ('".count($cos1)."', '".$_POST['name']."', '".$_POST['description']."','".$_SESSION["current_user"]."', '0')";
            $con->query($sqlquery);
            header('location: strona.php');
    }
    echo '</form>';

    echo '<a href="strona.php">Wróć</a></center></div>';
    ?>
        </div></center>
    </body>
</html>