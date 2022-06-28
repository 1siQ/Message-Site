
<?php
if (isset($_GET["name"])) {
  $to = $_GET["name"];
  setcookie("to",$to); 
  $visibility_placeholder = "none";
  $visibility_chat = "flex";
}
else {
  $visibility_placeholder = "flex";
  $visibility_chat = "none";
  $to = null;
}

switch (login_sorgulama()) {
  case 'none':

    $btn ="flex";
    $name="none";
    $visibility_placeholder = "flex";
    $visibility_chat = "none";
    break;
  
  default:
    $name= login_sorgulama();
    $btn ="none";

    
    break;
}

if (isset($_POST["login"])) {
 $login =  login();
  if ($login != "") {
    echo '<div class="alert alert-danger" role="alert">
    '.$login.'
  </div>';
  }
}
if (isset($_POST["register"])) {
 $login =  register();
  if ($login != "") {
    echo '<div class="alert alert-danger" role="alert">
    '.$login.'
  </div>';
  }
}
if (isset($_GET["logout"])) {
  cikis();
}
// if (isset($_POST["mesa"])) {
//   mesaj_gonder();
// }

?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>page</title>
  </head>
  <body>
