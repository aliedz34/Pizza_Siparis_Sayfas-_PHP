<!doctype html>
<html lang="tr-TR">

	<head>
	
    <meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="PizzaSitesi.css"/>
	<title>  </title>      
    
	</head>	
		<body background="icons\pizza_background1_1900x900.jpg">
		
		<div id="genelDiv">
		
			<div id="solDiv">				
				
				<form action='PizzaSitesi2.php' method='post'>
				<p>
				<div id="solDiv1">
				<fieldset>
				<legend>Kişisel Bilgiler</legend>				
				Ad <input type="text" name="ad" required> <br><br>
				Soyad <input type="text" name="soyad" required><br><br>
				Email <input type="text" name="email">
				</fieldset><br>
				</div>
				
				<div id="solDiv2">
				<fieldset>
				
				<legend>Pizza</legend>
				Seçiniz  
				<select name="pizzalar">
					<option value="bolMalzemos">Bol Malzemos</option>
					<option value="akdenizAksamlari">Akdeniz Akşamları</option>
					<option value="Sucuklu Vegan">Sucuklu Vegan</option>
					<option value="italyan">İtalyan</option>
					<option value="etObur">Et Obur</option>
					<option value="ananasCenneti">Ananas Cenneti</option>
				</select>
				<br><br>
				
				Boyutunu Seçiniz 
				<input type="radio" name="boyut" value="kucuk" checked> Küçük
				<input type="radio" name="boyut" value="orta"> Orta
				<input type="radio" name="boyut" value="buyuk"> Büyük
				<br><br>
				
				Kenar Seçiniz
				<select name="kenar">
					<option value="normalKenar">Normal Kenar</option>
					<option value="mozarellaKenar">Mozarella Kenar</option>
					<option value="parmesanKenar">Parmesan Kenar</option>					
				</select>
				<br><br>
				
				Hamur Seçiniz
				<select name="hamur">
					<option value="ince">İnce</option>
					<option value="normal">Normal</option>
					<option value="kalin">Kalın</option>					
				</select>
				</fieldset><br>
				</div>
				
				<div id="solDiv3">
				<fieldset>
				<legend>Malzemeler ve Soslar</legend>
				Ekstra Malzemeler (2 Adet Ekstra Malzeme Ücretsizdir)<br><br>
				<input type="checkbox" name="malzemeler[]" value="sosis" checked>Sosis				
				<input type="checkbox" name="malzemeler[]" value="siyahZeytin">Siyah Zeytin			
				<input type="checkbox" name="malzemeler[]" value="jambon">Jambon
				<br><br>                     
				<input type="checkbox" name="malzemeler[]" value="misir">Mısır				
				<input type="checkbox" name="malzemeler[]" value="domates">Domates			
				<input type="checkbox" name="malzemeler[]" value="sogan">Soğan
				<br><br>                     
				<input type="checkbox" name="malzemeler[]" value="yesilBiber">Yeşil Biber				
				<input type="checkbox" name="malzemeler[]" value="mantar">Mantar			
				<input type="checkbox" name="malzemeler[]" value="beyazPeynir">Beyaz Peynir
				<br><br>

				Soslar<br><br>
				<input type="checkbox" name="soslar[]" value="aciSos" checked>Acı Sos				
				<input type="checkbox" name="soslar[]" value="meksikaSos">Meksika Sos			
				<input type="checkbox" name="soslar[]" value="yogurtluSos">Yoğurtlu Sos
				</fieldset><br>
				</div>
				
				<div id="solDiv4">
				<fieldset>
				<legend>İçecek</legend>
				Seçiniz  
				<select name="icecek">
					<option value="cocaCola">Coca Cola</option>
					<option value="fanta">Fanta</option>
					<option value="sprite">Sprite</option>
					<option value="ayran">Ayran</option>
					<option value="iceTea">Ice Tea</option>
					<option value="salgam">Şalgam</option>
					<option value="sadeSoda">Sade Soda</option>
					<option value="su">Su</option>
				</select>				
				
				Adet 				
				<select name="adet">
					<option value="bir">1</option>
					<option value="iki">2</option>
					<option value="uc">3</option>
					<option value="dort">4</option>
					<option value="bes">5</option>
					<option value="alti">6</option>
					<option value="yedi">7</option>
					<option value="sekiz">8</option>
					<option value="dokuz">9</option>
					<option value="on">10</option>
				</select>
				</fieldset><br>			
				
				<br>
				</div>				
				
				<div id="solDiv5">
				İstekleriniz ve Görüşleriniz Bizim İçin Çok Değerli<br>
				<textarea rows="5" cols="50" name="textArea" placeholder=" İstek ve görüşleriniz... "></textarea>
				<br>			
				
				<input type="submit" value="Sipariş Ver" name="siparisVer">
				</div>

				</p>
				</form>
				
			</div>		
		</div>	
		
		</body>
		
</html>