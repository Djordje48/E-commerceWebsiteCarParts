<?php

session_start();
require_once('./php/CreateDb.php');
require_once('./php/component.php');



$database=new CreateDb("Productdb","Producttb");
if(isset($_POST['add'])){
	//print_r($_POST['product_id']);
	if(isset($_SESSION['cart'])){
		$item_array_id=array_column($_SESSION['cart'],"product_id");
		
		
		if(in_array($_POST['product_id'],$item_array_id)){
			echo "<script>alert('Proizvod je vec dodat u korpu!')</script>";
			echo "<script>window.location='bmw.php'</script>";
		}else{
			$count=count($_SESSION['cart']);
			$item_array=array(
				'product_id'=>$_POST['product_id']
			);
			$_SESSION['cart'][$count]=$item_array;
			
		}
		
	}else{
		$item_array=array(
			'product_id'=>$_POST['product_id']
		);
		
		$_SESSION['cart'][0]=$item_array;
		//print_r($_SESSION['cart']); 
	}
}
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8">
	<title>O-G</title>
	<link rel="stylesheet" href="css/stil.css" type="text/css">
	<link rel="stylesheet" href="css/stil.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/iee.css">
	<![endif]-->

</head>	
<body>
	<div id="header">
		<div>
			<a href="index.html" class="logo"><img src="slike/logo.jpg" alt=""></a>
			<form action="index.html">
					<input type="text" name="Pretraga" id="Pretraga" value="">
					<input type="submit" name="pretragaBtn" id="pretragaBtn" value="">
			</form>
			<div class="korpa">
				<a href="cart.php"><button style="font-size:24px " class="btn btn-danger">Korpa <i class="fa fa-shopping-cart"></i>
					<?php
						if(isset($_SESSION['cart'])){
							$count=count($_SESSION['cart']);
							echo "<span id=\"cart_count\" style=\"text-align:center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem; font-family:'Lato-Light';\" class=\"text-secondary bg-light\">$count</span>";
						}else{
							echo "<span id=\"cart_count\" style=\"text-align:center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem; font-family:'Lato-Light';\" class=\"text-secondary bg-light\">0</span>";
						}
					?>
				</button></a>
			</div>
		</div>
		
		
		<div class="Navigacija">
			<ul>
				<li>
					<a href="index.php">Pocetna</a>
				</li>
				<li class="selektovano">
					<a href="akumulatori.php">Akumulatori</a>
					<ul>
						<li>
							<a href="bosch.php">Bosch</a>
						</li>
						<li>
							<a href="energizer.php">Energizer</a>
						</li>
						<li>
							<a href="varta.php">Varta</a>
						</li>
					</ul>
					
				
				</li>
				<li>
					<a href="motornaulja.php">Motorna ulja</a>
					<ul>
						<li>
							<a href="services.php">Total</a>
						</li>
						<li>
							<a href="services.php">Castrol</a>
						</li>
						<li>
							<a href="services.php">Elf</a>
						</li>
						
					</ul>
					
						
					
				</li>
				<li>
					<a href="delovi.php">Vrste delova</a>
					
				</li>
				<li>
					<a href="servis.php">Servis</a>
				</li>
				<li class="booking">
					<a href="kontakt.php">Kontakt</a>
				</li>
			
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="content">
			<div class="section">
				<div class="breadcrumb">
					<span>Putanja:</span>
					<ul>
						<li>
							<a href="index.php">Pocetna</a>
						</li>
						<li>
							<a href="servis.php">Servis</a>
						</li>
						<li>
							<a href="velikiservis.php">Veliki servis</a>
						</li>
					</ul>
				</div>
				<div class="company">
					<h2>Veliki servis</h2>	
					<a href="bmw.php"><img src="slike/veliki_servis_01.jpg"></a>	
					<p>Veliki servis spada u redovne servise u životnom veku jednog vozila i neophodno je pridržavati se tog pravila. Nakon određene pređene kilometraže potrebno je zameniti neke dotrajale delove</p>					
					<h4>Veliki servis podrazumeva zamenu:</h4>
					<p>Seta zupčastog kaiša (zupčasti kaiš, španeri, roleri...),Pumpe za vodu.</p>
					<h4>Da li ste znali:</h4>
					<p>Da bi se sva četiri takta rada motora sa unutrašnjim sagorevanjem odvijala usklađeno potrebno je da rad radilice motora bude usklađen sa radom bregastog vratila i ventila. Ova dva mehanička sistema povezuje zupčasti kaiš ili pogonski lanac. Naravno u zavisnosti od konstrukcije motora sistem zupčastog kaiša zahteva postojanje zatezača i jednog ili više rolera. Ukoliko je ovaj sistem neusklađen (tj. ukoliko pogonski kaiš ili lanac oslabi i rastegne se ili ukoliko dođe do preskakanja nekoliko zubaca zupčanika) može doći do situacije da motor ne može da startuje ili da se gasi. U najgorem slučaju ukoliko dođe do loma zatezača ili zupčastog kaiša može doći do havarije na motoru u smislu lomljenja i krivljenja ventila, zatim oštećenja izazvana izletanjem ili krivljenjem klipa radilice i sl.</p>
					<h4>Preporuka:</h4>
					<p>Vrlo je važno vršiti inspekciju ovog sistema i na propisanoj kilometraži menjati sve delove tj. zupčasti kaiš, rolere, španere i pumpu za vodu. Ta kilometraža za zamenu je 60.000km do 90.000 km u zavisnosti od preporuke proizvođača ali i od kvaliteta ugrađenih delova.</p>
				</div>
			</div>
			<div class="sidebar">
				<div class="navigation">
					<h3>Servis</h3>
					<ul>
						<li>
							<a href="servis.php">Vrste servisa</a>
						</li>
						<li>
							<a href="maliservis.php">Mali servis</a>
						</li>
						<li class="selected">
							<a href="velikiservis.php">Veliki servis</a>
						</li>
						<li>
							<a href="zamenatecnosti.php">Zamena tecnosti</a>
						</li>
						<li>
							<a href="zamenatrapa.php">Zamena trapa</a>
						</li>
						<li>
							<a href="autoklima.php">Auto klima</a>
						</li>
						<li>
							<a href="dijagnostika.php">Dijagnostika</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div>
			<div class="contact">
				<h3>Kontakt informacije</h3>
				<ul>
					<li>
						<b>Adresa:</b> <span>Kragujevac,Luja Pastera br:20</span>
					</li>
					<li>
						<b>Telefon:</b> <span>+38169345867</span>
					</li>
					<li>
						<b>Fiksni:</b> <span>034 361 95 95</span>
					</li>
					<li>
						<b>email:</b> <span>ogautodelovi@gmail.com</span>
					</li>
				</ul>
			</div>
			<div class="contact">
				<h3>Kontakt informacije servis</h3>
				<ul>
					<li>
						<b>Adresa:</b> <span>Miodraga Vlajica Suke br:33</span>
					</li>
					<li>
						<b>Telefon:</b> <span>+38166364855</span>
					</li>
					<li>
						<b>Fiksni:</b> <span>034 361 95 95</span>
					</li>
					<li>
						<b>Radno vreme</b> <span>Pon. – Pet. 8:00 – 16:00 Subotom. 9:00 – 13:00</span>
					</li>
				</ul>
			</div>
			
			<div class="posts">
				<h3>O firmi</h3>
				<ul>
					<li>
						<a>Naziv firme:O-G d.o.o</a>
					</li>
					<li>
						<a>34000 Kragujevac, Srbija</a>
					</li>
					<li>
						<a>Matični broj: 20369185</a>
					</li>
					<li>
						<a>Pib: 105372638 </a>
					</li>
				</ul>
			</div>
			<div class="connect">
				<h3>Ostanite u kontaktu</h3>
				<p>
					<a>Pratite nas na drustvenim mrezama,saznajte novosti o popustima i novim delovima!</a>
				</p>
				<ul>
					<li id="facebook">
						<a href="http://freewebsitetemplates.com/go/facebook/">facebook</a>
					</li>
					<li id="twitter">
						<a href="http://freewebsitetemplates.com/go/twitter/">twitter</a>
					</li>
					<li id="googleplus">
						<a href="http://freewebsitetemplates.com/go/googleplus/">googleplus</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="section">
			<p>
				&copy; this is the copyright area
			</p>
			<ul>
				<li>
					<a href="index.php">Pocetna</a>
				</li>
				<li>
					<a href="akumulatori.php">Akumulatori</a>
				</li>
				<li>
					<a href="motornaulja.php">Motorna ulja</a>
				</li>
				<li>
					<a href="delovi.php">Vrste delova</a>
				</li>
				<li>
					<a href="servis.php">Servis</a>
				</li>
				<li>
					<a href="kontakt.php">Kontakt</a>
				</li>
			</ul>
		</div>
		
		
		
		
		
		
		
	
	
	
	
	</div>
</body>
</html>