<?php
include_once "controller/db.php";






    $mes = strip_tags($_POST["mesaj"]);
    $from  = $_COOKIE["user"];
    $to  = $_POST["name"];

    $users = $db->prepare("INSERT INTO messages(mes_text, mes_from, mes_to) VALUES (?,?,?)");
    $users->execute([$mes,$from,$to]);

        echo true;
    





