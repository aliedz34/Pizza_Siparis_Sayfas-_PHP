<!doctype html>
<html lang="tr-TR">

	<head>
	
    <meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="PizzaSitesi2.css"/>
	<title>  </title>      
    
	</head>
		<?php
		
			if(isset($_POST['siparisVer'])){
				$isim=$_POST['ad'];				
				$soyisim=$_POST['soyad'];
				$email=$_POST['email'];				
				$pizza=$_POST['pizzalar'];
				$boyut=$_POST['boyut'];		
				$kenar=$_POST['kenar'];		
				$hamur=$_POST['hamur'];
				if(empty($_POST['malzemeler'])){
					$secilenMalzeme = "Malzeme seçilmedi";
					$kontrolMalzeme=false;
				}
				else{
					$malzeme=$_POST['malzemeler'];
					$kontrolMalzeme=true;
				}	
				
				if(empty($_POST['soslar'])){
					$secilenSos = "Sos seçilmedi";
					$kontrolSos=false;
				}
				else{
					$sos=$_POST['soslar'];
					$kontrolSos=true;
				}					
				$icecek=$_POST['icecek'];		
				$adet=$_POST['adet'];
				$text=$_POST['textArea'];
				}

				//echo substr_count($email, '@');  //kontrol amaçlı yazılan kod.

				if(substr_count($email, '@')==1 && substr_count($email, '.')>0){	//e posta adresinin geçerli olup
					$uyari=" (Geçerli E-Posta) ";	//olmadığının kontrolü.
				}
				else{
					$uyari=" (Geçersiz E-Posta) ";
				}

				$temp=0; //static değişkeni kullanmak için oluşturulan değişken.
				
				function KuponSay(){
					STATIC $kupon=0;
					$kupon++;
					GLOBAL $temp; //static değişkeni fonksiyon dışında kullanmak
					$temp=$kupon; //için global bir değişkene atadık.
				}
			

		?>
	<body>
		<div id="genelDiv">
			<div id="siparisDiv">
				<h1>Siparişiniz</h1>
				
				<div id="phpDiv">
				<?php
				$pizzas = array(
					"bolMalzemos"=>array("fiyat"=>20),
					"akdenizAksamlari"=>array("fiyat"=>15),
					"sucukluVegan"=>array("fiyat"=>25),				
					"italyan"=>array("fiyat"=>12),
					"etObur"=>array("fiyat"=>30),
					"ananasCenneti"=>array("fiyat"=>10)
					);
					
					$fiyat=0;
				   
				
					
				//indisler POST metoduyla alınan değerlerle karşılaştırmak için aynı olmalı	
				$pizzaBoyut=array("kucuk"=>0,"orta"=>5,"buyuk"=>10);	
				$pizzaKenar=array("normalKenar"=>0,"mozarellaKenar"=>3,"parmesanKenar"=>5);	
				$pizzaHamur=array("ince"=>0,"normal"=>3,"kalin"=>5);
				$icecekler=array("cocaCola"=>5,"fanta"=>5,"sprite"=>5,"ayran"=>4,
							"iceTea"=>5,"salgam"=>3,"sadeSoda"=>2,"su"=>1);
				$icecekAdet=array("bir","iki","uc","dort","bes","alti","yedi","sekiz","dokuz","on");
				
				
				echo " AD : ".$ad."<br>";
				echo " SOYAD : ".$soyisim."<br>";
				echo " EMAIL : ".$email.$uyari."<br>";
				
				foreach($pizzas as $key=>$value1){
					foreach($value1 as $key2=>$value2){		
						if($pizza==$key){	  						
							$fiyat=$value2;
							echo "PIZZANIZ : ".$pizza."  (".$fiyat." TL)"."<br>";
							KuponSay();
						}
					}
				}	
				
				foreach($pizzaBoyut as $key=>$value2){
					if($boyut==$key){
						$fiyat+=$value2;						
						echo " BOYUT : ".$boyut." (".$value2." TL eklendi)"."<br>";
						KuponSay();
					}
				}
				
				foreach($pizzaKenar as $key=>$value3){
					if($kenar==$key){
						$fiyat+=$value3;						
						echo " KENAR : ".$kenar." (".$value3." TL eklendi)"."<br>";
						KuponSay();
					}
				}
				
				foreach($pizzaHamur as $key=>$value4){
					if($hamur==$key){
						$fiyat+=$value4;						
						echo " HAMUR : ".$hamur." (".$value4." TL eklendi)"."<br>";
						KuponSay();
					}
				}
				
				if($kontrolMalzeme){
				$malzemeSayac=0;	//2 adet malzeme ücretsiz olduğu için sayaç kullanıldı.
				$malzemeFiyat=0;
				echo "MALZEMELERİNİZ : ";
				foreach($malzeme as $value5){
					echo $value5." ";
					$malzemeSayac++;
				}
				if($malzemeSayac>2){	//seçili malzeme 2 den fazlaysa para eklenicek.
					$malzemeFiyat=($malzemeSayac-2)*2;
					$fiyat+=$malzemeFiyat;
				}
				echo " (".$malzemeFiyat." TL eklendi)";
				echo "<br>";
				}
				else{
					echo $secilenMalzeme;
					echo "<br>";
					$kontrolMalzeme=true;
				}								
				
				if($kontrolSos){
				$sosSayac=0;	//soslar ücretli olduğu için sayaç kullanıldı.
				$sosFiyat=0;
				echo "SOSLARINIZ : ";
				foreach($sos as $value6){
					echo $value6." ";
					$sosSayac++;
				}
				if($sosSayac>0){
					$sosFiyat=$sosSayac*3;
					$fiyat+=$sosFiyat;
				}
				echo " (".$sosFiyat." TL eklendi)";
				echo "<br>";
				}
				else{
					echo $secilenSos;
					echo "<br>";
					$kontrolSos=true;
				}			
				
				$icecekSayisi=0;
				for($i=0; $i<count($icecekAdet); $i++){
					if($adet==$icecekAdet[$i]){
						$icecekSayisi=$i+1;
					}
				}
				
				foreach($icecekler as $key=>$value7){
					if($icecek==$key){
						$icecekFiyat=($value7*$icecekSayisi);
						$fiyat+=$icecekFiyat;
						
						echo " İÇECEK : ".$icecekSayisi." adet ".$icecek." (".$icecekFiyat." TL eklendi)"."<br>";
					}
				}
				echo "<br>";				
				echo "Toplam Fiyat = ";
				echo $fiyat;

				echo "<br>"; echo "<br>";

				echo $temp;
				echo " Adet kuponunuz bulunmaktadır";

				echo "<br>"; echo "<br>";

				echo "NOT : ".$text;
				
				?>
				</div>
				
			</div>
		</div>
	</body>
		
</html>
