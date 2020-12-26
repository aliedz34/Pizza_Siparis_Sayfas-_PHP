<!doctype html>
<html lang="tr-TR">

	<head>
	
    <meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="login.css"/>
	
	<title>  </title>      
    
	</head>
	
	<body>
	
<?php
session_start();

$sayi2=$_SESSION['sayi1'];

if(isset($_POST['giris'])){
    $kullaniciAd=$_POST['kullanici_adi'];				
    $sifre=md5($_POST['sifresi']);        //veritabanındaki şifreler md5 le saklandığı için girilen şifreyi md5 e çevirdik.
    $sayiKontrol=($_POST['captchaText']);
    }


    //PDO ile veritabanı bağlantısını yapıyoruz.
	$DB_SERVER = 'localhost';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';
    $DB_DATABASE = 'pizzaveritabani';

    try {
        $baglanti = new PDO("mysql:host=$DB_SERVER; dbname=$DB_DATABASE; charset=utf8", $DB_USERNAME, $DB_PASSWORD);
        $baglanti->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Bağlandı";
        echo "<br>";
    }
    catch(PDOException $e){
        echo "Bağlantı sağlanamadı: " . $e->getMessage();
        echo "<br>";
    }


    //sql sorgumuzda girilen kullanıcı adı eğer eşitse veritabanındaki 
    //kullanıcı adına, kullanıcı tablosundan sifreyi çekiyoruz.
    $sorgu = $baglanti->prepare('SELECT sifre FROM kullanicilar WHERE kullanici = :kullaniciAd');
    $sorgu->execute(array('kullaniciAd' => $kullaniciAd));
    $sonuc=$sorgu->fetch();
   
    
    if($sifre==$sonuc["sifre"] && $sayi2==$sayiKontrol){     //girilen şifre veritabanındaki şifreye eşitse ve
        echo "giriş başarılı";                               //girilen captcha doğruysa
        header("Location: PizzaSitesi.php");                 //siteye git.
    }
    else{
        echo "<font color='#0033cc'>HATALI GİRİŞ</font>";
        echo "<br>";
        echo "<br>";
        echo "<font color='#0033cc'>Bir önceki sayfada girdiğiniz bilgileri kontrol edip tekrar giriş yapınız.</font>";
        //header("Location: index.php");
    } 

    if (!$sorgu) {
        printf("Error: %s\n", $sorgu->errorInfo());
        exit();
    } 

?>

	</body>
		
</html>