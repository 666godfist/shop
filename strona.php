<html>
    <head>
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
        <center><div class="d1">
    <?php
        session_start();
        echo 'Zalogowany jako: '.$_SESSION["current_user"].'';

        echo '<form action="index.php"><button>Wyloguj</button></form>';
        echo '<form action="dodawanie.php"><button>Wystaw</button></form>';

        $con = new mysqli("127.0.0.1","root","","sklep-zsp");
        echo '<form method="POST" action="dodawanie.php">';
        $res = $con->query("SELECT * FROM offerts WHERE users_id=".$_SESSION['current_user']);
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM users");
        $cos1 = $res1->fetch_all();

        echo '<div class="srodek">';
        for($i=0; $i<count($cos);$i++)
        {
            echo 'Przedmiot: '.$cos[$i][1].', Sprzedający: '.$_SESSION["current_user"]. " <a href='edytowanie.php?offer_id=".$cos[$i][0]."'>Edytuj</a>'<br>";
        }

        echo '</div></form>';
    ?>
        </div></center>
    </body>
</html>