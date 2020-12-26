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

	$sayi=0;

	function SayiUret(){
		$GLOBALS ['sayi'] = rand(10000, 99999);
	}
	SayiUret();

	$_SESSION['sayi1']=$sayi;	

	?>

	<?php
		class Islem{		//Islem adında bir sınıf oluşturuldu.
			public $ipAdresi=0;	//Bu sınıfın 2 adet üye özelliği var.
			public $server="";

			function AdresBul(){	//Ve 2 adet üye fonksiyonu var.
				$ipAdresi=$_SERVER['REMOTE_ADDR'];
				return $ipAdresi;
			}
			function ServerBul(){
				$server=$_SERVER['SERVER_NAME'];
				return $server;
			}
		}

		$nesne=new Islem();		//Sınıfın fonksiyonlarına erişmek için önce bir nesne oluşturuldu.
		$adres=$nesne->AdresBul();		//Ardından fonksiyonlar çağırıldı.		
		$sunucu=$nesne->ServerBul();

	?>

	<br><?php//bugünün tarihi yazdırılıyor.?>
	<font face='tahoma' color='#00cc00'><strong> <?php echo "Tarih : ". date("d-m-y"); ?></strong> </font>
	<br>

<div class="capta" id="loginDiv">
		
	<form action="LoginAyar.php" method="POST">
		
		<fieldset>
				<legend>Giriş Sayfası</legend>				
				Kullanıcı Adı <input type="text" name="kullanici_adi" required> <br><br>
				Şifre <input type="password" name="sifresi" required><br><br>
				
				CAPTCHA = <?php echo $sayi ?>
						<input type="text" name="captchaText" required>						
						<br><br>
				 <input type="submit" name="giris" value="Giriş">
		</fieldset><br>

		<?php//sayfaya bağlanılan ip adresi ve server bilgileri yazdırılıyor.?>
		<font face='tahoma' color='#0033cc'><strong> <?php echo "IP Adresiniz hacklendi yarramı ye : ".$adres; ?></strong> </font>
		<br>
		<font face='tahoma' color='#0033cc'><strong> <?php echo "Server : ".$sunucu; ?></strong> </font>
		
	</form>
	</div>
	</body>
		
</html>