<?php
include_once "controller/db.php";

function metni_bol($text,$limit){
	// metnin başında ve sonundaki boşlukları alıyoruz. 
	$text = trim($text);
	// metindeki html taglarını temizliyoruz. 
	$text = strip_tags($text);
	
	// metni boşluklardan bölüp kelimeler dizisi oluşturalım
	$kelimeler= explode(" ",$text);
	// eğer metindeki kelimeler verdiğimiz limitten azsa kelime dizisi kadar limit veriyoruz
	if(count($kelimeler)<$limit){
		$sayac = count($kelimeler);
		$noktalar = "";
		
		}else{ // değilse sadece limit kadar kelime alıyoruz sonuna ... koyuyoruz
			$sayac = $limit;
			$noktalar = "...";
			}
	// yeni metin adında değişken oluşturulur
	$new_text = "";
	// kelimeleri istediğimiz değer kadar (sayac) döngüye sokuyoruz
	for($i=0;$i<$sayac;$i++){
		// her kelimeyi yeni metin  değişkenimize ekliyoruz.
		$new_text.= $kelimeler[$i]. " ";
		}
		
		// metnin sonundaki boşluğu alıyoruz.
		$new_text = trim($new_text);
		// metnin sonuna gerekliyse ... koyuyoruz.
		$new_text .= $noktalar;
		
		// yeni metni geri döndürüyoruz. 
		return $new_text;
		
	}
function login_sorgulama(){
	if (isset($_COOKIE["user"])) 
	{  
		
		  return $name = $_COOKIE["user"];
		
	}
	else 
	{
		return "none";
	}
}
function login(){
		global $db;
		if ($_POST["name"] !="" && $_POST["pass"] !="") 
		{

			$name = strip_tags($_POST["name"]);//postla gelenleri değişkenlere atıyoruz.
			$pass = strip_tags($_POST["pass"]);

			$users = $db->prepare("SELECT * FROM  users WHERE user_name = ? and user_pass = ?");
			$users->execute([$name,$pass]);//databsedeki usernameleri çekiyoruz.
			$usercount = $users->rowCount();
				if ($usercount > 0) //databaseden çektiğimiz usernamelerle kullanıcının girdiği
				{					//username eşleşiyormu diye kontrol ediyoruz
					foreach ($users as $user) 
					{
						setcookie("user",$user["user_name"],time() + 60*60*24*6); //kullanıcıcyı giriş yaptırıyoruz
						header("Refresh:0 url=index.php");	
					}
					
				}
				else 
				{  
					
					return "Yanlış bilgi girdiniz.";

				}
		}
		else
		{
			return "Boş Alan Bırakmayınız.";
		}
}
function register()
{
	global $db;

	if (isset($_POST["register"]))
	{
		if ($_POST["name"] != "" && $_POST["pass"] != "" )
		{
			
			$name = strip_tags($_POST["name"]);
			$pass  = strip_tags($_POST["pass"]);

			$user = $db->prepare("SELECT * FROM  users WHERE user_name = ? ");
			$user->execute([$name]);
			$usercount = $user->rowCount();
				
				if ($usercount <= 0) 
				{
					
					$users = $db->prepare("INSERT INTO users (user_name, user_pass) VALUES (?,?)");
					$users->execute([$name,$pass]);
					setcookie("user",$name,time() + 60*60*24*6 ) ;  
					header("Refresh:0 url=index.php");	

				}
				else 
				{
					return "Kullanıcı Adı Kullanılmaktadır";
				}
		}
		else 
		{
			return "Boş Bırakmayın";
		}
	}
}
function cikis()
{
	setcookie("user",1,time() -1 ) ; 
	header("Refresh:0 url=index.php");
	return "flex";
}

function kisi_listele()
{
	global $db;
    $users = $db->prepare("SELECT *  FROM  users");
    $users->execute();
	return $users;
                                   
}
function mesaj_gonder(){
		global $db;
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
			return "Boş mesaj Gönderemezsin";
			header("Refresh:0 url=index.php?name=$to#e");
		
		}
}
function mesaj_cek($name,$username){
	global $db;
		
		$users = $db->prepare("SELECT *  FROM  messages where mes_from =? and mes_to =? or mes_from =? and mes_to =?");
		$users->execute([$name,$username,$username,$name]);
		return $users;							
	
}