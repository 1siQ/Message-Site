<?php
include_once "controller/db.php";
include_once "controller/db.php";
include_once "inc/nav.php";

#get değeri sorgusu
if (isset($_GET["name"])) {
    $get = $_GET["name"];
}
else {
    $get = "";
}
#get değeri sorgusu

#mesaj gönderiliyor
if (isset($_POST["submit"]))
{
   if ($_POST["mes"] != "" && $_POST["from"] != "" && $_POST["to"] != "" )
   {

    $mes = strip_tags($_POST["mes"]);
    $from  = $_POST["from"];
    $to  = $_POST["to"];          
            $users = $db->prepare("INSERT INTO messages(mes_text, mes_from, mes_to) VALUES (?,?,?)");
            $users->execute([$mes,$from,$to]);
            
   }
   else 
   {
    echo "Boş mesaj Gönderemezsin";
    header("Refresh:2 url=index.php?name=$get#e");
   
   }
}
#mesaj gönderildi




if(isset($_COOKIE["user"]))
{
   $username = $_COOKIE["user"];
   $sit=null;
}
else 
{
    $username = null;
    $sit="none";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> mesajlaşma</title>
  </head>
  <body>
   <div class="container">
        <div class="row">
            <div class="col-12  col-lg-6 cocol-">
                        <h2 class="mt-5">Giriş Yap</h2>
                <form method="post" class="mt-2 mb-5 " action="login.php">
                    <input name="name" placeholder="name" type="text">
                    <input name="pass" placeholder="pass" type="password">
                    <input placeholder="giriş yap" class="btn btn-success" type="submit" value,="kayıt" name="submit" id="">
                </form>
                <h2 class="mt-5">Kayıt Ol</h2>
                <form method="post" class="mt-2 " action="register.php">
                    <input name="name" placeholder="name" type="text">
                    <input name="pass" placeholder="pass kaıt" type="text">
                    <input placeholder="kayıt ol" class="btn btn-success" type="submit" value,="kayıt" name="submit" id="">
                </form>
                
            </div>
            <div class="col-lg-6  col-12 mt-5">
                <h2 class="mt-3 d-<?=$sit?>">Hoşgeldin <span class="text-danger"><?=$username?></span></h2>
                    <div class="card w-100  mt-3 d-<?=$sit?>">
                        <div class="card-header text-center"> 
             <div class="row"> <div class="col-3">
              <a class="btn  btn-info" href="index.php?name=<?=$get?>#e " >yenile</a>    </div>   <div class="col-6" >   <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    if ($get == "") {
                                        echo "Kişi Seçiniz";
                                    }
                                    else {
                                        echo $get;
                                    }
                                    ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php
                                        $users = $db->prepare("SELECT *  FROM  users");
                                        $users->execute();
                                        foreach ($users as $user) 
                                        {
                                            $name = $user["user_name"];
                                            if ($name != $username) {
                                                echo "<li><a class='dropdown-item' href='index.php?name=$name#e'>$name</a></li>                                                ";  
                                            }
    
                                        }
                                    ?>

                                </ul>
                            </div>
                        </div>
                        </div>
                        </div>
                        <div style="height:15rem;" class="card-body overflow-scroll d-flex">
                            <div class="row w-100">
                                    <div class="col-12">
                                <?php
                                if ($get != "") {
                                    $name = $_GET["name"];
                                    $users = $db->prepare("SELECT *  FROM  messages where mes_from =? and mes_to =? or mes_from =? and mes_to =?");
                                    $users->execute([$name,$username,$username,$name]);
                                    foreach ($users as $user) 
                                    {
                                       $text = $user["mes_text"]; 
                                       $from = $user["mes_from"]; 
                                       $to = $user["mes_to"]; 

                                       if ($from == $username) 
                                       {
                                           $color = "info"; 
                                           echo "
                                    
                                           <div class='card text-end p-2 float-end text-dark bg-info mb-3 w-75' >
                                               <div class='card-body>'
                                                   <p class='card-text'>$text</p>
                                               </div>
                                           </div>
                                           ";
                                       }
                                       else
                                        {
                                          
                                           echo "
                                    
                                           <div class='card text-dark bg-light mb-3 w-75'>
                                               <div class='card-body>'
                                                   <p class='card-text'>$text</p>
                                               </div>
                                           </div>
                                           ";
                                        }


                                    
                                    
                                    }
                                }
                                
                            ?>
                                <a id="e" href=""></a>
                                    
                                </div>
                            </div>                                    
                        </div>

                        <div class="card-footer ">
                            <form method="post" action="index.php?name=<?=$get?>#e">   
                                <textarea   placeholder="mesajmesaj yaz" class="w-100" name="mes" id=""  rows="2"></textarea>
                                <input type="hidden" name="from" value="<?=$username?>" id="">
                                <select name="to" class="form-select" aria-label="Default select example">
                                    <option >Kişi Seçiniz</option>
                                    <?php
                                        $users = $db->prepare("SELECT *  FROM  users");
                                        $users->execute();
                                        foreach ($users as $user) 
                                        {
                                            $name = $user["user_name"];
                                            if ($name != $_COOKIE["user"] && $name !=$get) {
                                                echo "<option value='$name'>$name</option>";  
                                            }
                                            else if ($name == $get) {
                                                echo "<option selected value='$name'>$name</option>";
                                            }
                                            
                                             
                                        }
                                    ?>                      
                                    </select>
                                <input class="text-center" type="submit" name="submit" id="">
                            </form>
                        </div>
                    </div>
            </div>
        </div>
   </div> 





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>
