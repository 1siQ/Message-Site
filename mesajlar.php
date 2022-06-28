<?php
include_once "controller/db.php";
include_once "controller/functions.php";

ob_start();

foreach (mesaj_cek($_COOKIE["user"],$_COOKIE["to"]) as $user) 
{
    $text = $user["mes_text"]; 
    $gonderen = $user["mes_from"]; 

    if ($gonderen == $_COOKIE["user"]) 
    { 
        echo"   <div style='max-width:35rem;' class='card col-12 text-end float-end p-2 text-light fs-6 bg-success mb-3' >
                    <div class='card-body'>
                        <p class='card-text'>$text</p>
                    </div>
                </div>
                                               
            ";
    }
    else
    {                 
        echo"   <div 'style=max-width:35rem; background-color:#FFEFEF;' class='card text-dark p-2 fs-6  mb-3 w-75'>
                    <div class='card-body'>
                        <p class='card-text'>$text</p>
                    </div>
                </div>
                                                
            ";
    }
                                   
}
