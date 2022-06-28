<?php

try 
{
$db = new PDO('mysql:host=localhost;dbname=ajax;charset=utf8',"root","");  



      
} 

catch (PDOExpection $e) 
{
    echo $e->getMessage();
}