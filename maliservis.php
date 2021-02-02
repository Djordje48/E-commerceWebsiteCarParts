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
							<a href="maliservis.php">Mali servis</a>
						</li>
					</ul>
				</div>
				<div class="company">
					<h2>Mali servis</h2>	
					<a href="bmw.php"><img src="slike/mali_servis.jpg"></a>	
					<p>Mali servis se obavlja najmanje jednom godišnje ili u zavisnosti od pređene kilometraže. Motorno ulje i filteri se menjaju preventivno - da bi se sprečilo prekomerno trošenje delova motora.</p>
					<p>Mali servis podrazumeva u osnovi zamenu motornog ulja i filtera ulja, filtera vazduha, filtera goriva i filtera kabine. Redovnim održavanjem obezbeđuje se sigurnost, pouzdanost, upravljivost, udobnost i dogotrajnost automobila. Krajnji servisni interval je naveden od strane proizvođača vozila u rasporedu servisa, dok savremeni automobili pokazuju krajnji rok za sledeći servis na instrument - tabli. Ipak, ukoliko procenite, u određenim uslovima servisni interval treba smanjiti u odnosu na fabrički preporučen.</p>
					<h4>Zasto se radi mali servis?</h4>
					<p>Svi delovi vozila se manje ili više troše u redovnoj upotrebi. Tokom vremena, njihova funkcija oslabi čak i kada se auto vrlo malo koristi. Pored toga, od intezivne upotrebe ili od nepovoljnih radnih uslova može doći do zapušenja filtera. Mali servis je preventivna zamena delova pre nego što dođe do njihovog otkazivanja i time uzrokuju mnogo veće kvarove. Servis je potrebno odraditi bez obzira na stanje delova. Ekonomski gledano bolje je obaviti mali servis na vreme nego rizikovati da dođe do nekog većeg kvara.</p>
					<h4>Mali servis podrazumeva:</h4>
					<p>Zamena motornog ulja,Zamena filtera motornog ulja,Poništavanje servisnog intervala,Zamena filtera vazduha motora,Zamena filtera vazduha kabine (polen filtera),Zamena filtera goriva,Provera nivoa kočione tečnosti i dopuna po potrebi,Provera nivoa rashladne tečnosti i dopuna po potrebi.</p>
				</div>
			</div>
			<div class="sidebar">
				<div class="navigation">
					<h3>Servis</h3>
					<ul>
						<li>
							<a href="servis.php">Vrste servisa</a>
						</li>
						<li class="selected">
							<a href="maliservis.php">Mali servis</a>
						</li>
						<li>
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