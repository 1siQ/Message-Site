<?php

include_once "controller/db.php";
include_once "controller/functions.php";
include_once "inc/header.php";
include_once "inc/nav.php";

?>

<div class="container">
    <div class="row">

        <div class="col-lg-8 col-12 ">
            <div class="row">
            
                <div class="col-12">
                    <div style="background-color:#92A9BD; height:35rem;" class="card d-<?=$visibility_placeholder?> w-100 mt-lg-4 mt-1" >
                        <h1 class="mx-auto mt-auto">Giriş Yapınız </h1>
                        <h1 class="mx-auto mb-auto">Eğer Giriş Yaptıysanız Kişi Seçiniz </h1>
                    </div>
                    <div style="height:35rem;" class="card d-<?=$visibility_chat?> border-0 mt-lg-4 mt-1 ">
                        <div style="background-color:#7C99AC;" class="card-header d-flex justify-content-center">
                            <span class="px-3 py-2 fs-5 badge rounded primary float-end"><?=$to?></span>
                        </div>
                        <div id="mesajlar" style="background-color:#92A9BD;" class="card-body overflow-scroll">
                            <?php
                                
                                    $users = mesaj_cek($_COOKIE["user"],$to);
                                foreach ($users as $user) 
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
                                    $users = $db->prepare("UPDATE `messages` SET `mes_durum`=1 WHERE mes_to =? and mes_from = ?");
                                    $users->execute([$_COOKIE["user"],$_COOKIE["to"]]);
                                    
                                   
                                }
                                
                            ?>
                            
                        </div>
                        <div style="background-color:#7C99AC;" class="card-footer">
                            <div class="form-floating">
                                <form action="" method="post">
                                    <div class="form-floating">
                                        <input  class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="background-color:#cad8e0; height: 100px"></textarea>
                                        <label for="floatingTextarea2">Mesajınız...</label>
                                    </div>
                                
                                    <input type="hidden" id="to" value="<?=$to?>">
                                    <button  class="btn btn-primary float-end my-3 me-3" onclick="kayit()">Gönder</button>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 ms-lg-5">
            <div  class="btn-group-vertical mt-lg-4 mt-1 w-100 " role="group" aria-label="...">
                <button type="button" class="btn btn-dark disabled ">Müsait Kişiler</button>
                
                    <?php
                       
                         if(isset($_COOKIE["user"]))
                         {
                            
                            foreach (kisi_listele() as $user) 

                            {
                                $name = $user["user_name"];
                                if ($name != @$_COOKIE["user"]) 
                                {
                                             
                                            echo "<a href='?name=$name' type='button' class='btn btn-dark border-top text-start'>$name</a>";
                                        
                                }
                            } 
                        
                         }
                                                                                         
                            
                    ?>
                
                
            </div>
        </div>  
<?php
require_once "inc/footer.php";
?>
