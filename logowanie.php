<html>
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
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
    <form method="POST" action="logowanie.php">
        <input type="Login" name="Login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Haslo" required>
        <input type="submit" name="submit" value="Wyslij">
     </form>
     ?>
     <header> (location: users.php)
     </header>
</body>




</html>