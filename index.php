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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/iee.css">
	<![endif]-->

</head>	
<body>	
	<div id="header">				
		<div>
			<i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
			<i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
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
				
				<li class="selektovano">
					<a href="index.php">Pocetna</a>
				</li>
				<li>
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
							<a href="total.php">Total</a>
						</li>
						<li>
							<a href="castrol.php">Castrol</a>
						</li>
						<li>
							<a href="elf.php">Elf</a>
						</li>
						
					</ul>
					
						
					
				</li>
				<li>
					<a href="delovi.php">Vrste delova</a>
				</li>
				<li>
					<a href="servis.php">Servis</a>
				</li>
				<li class="kontakt">
					<a href="kontakt.php">Kontakt</a>
				</li>
			
			</ul>
					
		</div>
	</div>
	
	
	<div id="body">
		<div class="header">
			<ul>
				<li>
					<a href="login.php" class="figure"><img src="slike/logovanjereg.png" alt=""></a>
					<div>
						<h3><a href="login.php">Uloguj se/Registracija</a></h3>
						<p>
							Klinkite da na registraciju u koliko nemate nalog
			
						</p>
					</div>
				</li>
				<li>
					<a href="bosch.php" class="figure"><img src="slike/boschl.jpg" alt=""></a>
					<div>
						<h3><a href="bosch.php">Bosch akumulatori</a></h3>
						<p>
							Bosch je jedan od najjboljih akumulatora u nasoj ponudi
			
						</p>
					</div>
				</li>
				<li>
					<a href="castrol.php" class="figure"><img src="slike/caslog.jpg" alt=""></a>
					<div>
						<h3><a href="castrol.php">Castrol ulje</a></h3>
						<p>
							Najjbolji izbor za kvalitet i vasu sigurnost
			
						</p>
					</div>
				</li>
			
			
			
			
			
			</ul>
	
		</div>
		<div class="body">
			<div class="slideshow-container">

				<!-- Full-width images with number and caption text -->
				<div class="mySlides fade">
					
					<img src="slike/varta1.png" style="width:100%">
					
				</div>

				<div class="mySlides fade">
					
					<img src="slike/castroledge.jpg" style="width:100%">
					
				</div>

				<div class="mySlides fade">
					
					<img src="slike/car-service.jpg" style="width:100%">
				
				</div>

				<!-- Next and previous buttons -->
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
			<br>

			<!-- The dots/circles -->
			<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
			</div>
			<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
				var i;
				var slides = document.getElementsByClassName("mySlides");
				var dots = document.getElementsByClassName("dot");
				for (i = 0; i < slides.length; i++) {
					slides[i].style.display = "none";  
				}
				slideIndex++;
				if (slideIndex > slides.length) {slideIndex = 1}    
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				slides[slideIndex-1].style.display = "block";  
				dots[slideIndex-1].className += " active";
				setTimeout(showSlides, 3000); // Change image every 3 seconds
			}
			</script>
		
		
		</div>
		<div class="footer">
			<div>
				<h2><span>Auto servis</span></h2>
				<ul>
					<li>
						<a href="maliservis.php" class="figure"><img src="slike/mali_servis1.jpg" alt=""></a>
						<div>
							<h3><a href="maliservis.php">Mali servis</a></h3>
							<p>
								Mali servis se smatra redovnim održavanjem vozila. Redovno održavanje vozila je neophodno da biste zadržali prvobitni kvalitet Vašeg vozila u pogledu sigurnosti, udobnosti i performansi.
							</p>
						</div>
					</li>
					<li>
						<a href="velikiservis.php" class="figure"><img src="slike/veliki_servis_011.jpg" alt=""></a>
						<div>
							<h3><a href="velikiservis.php">Veliki servis</a></h3>
							<p>
								Veliki servis spada u redovne servise u životnom veku jednog vozila i neophodno je pridržavati se tog pravila. Nakon određene pređene kilometraže potrebno je zameniti neke dotrajale delove.
							</p>
						</div>
					</li>
					<li>
						<a href="zamenatecnosti.php" class="figure"><img src="slike/zamena_kocione_022.jpg" alt=""></a>
						<div>
							<h3><a href="zamenatecnosti.php">Zamena tecnosti</a></h3>
							<p>
								Održavanje kočionog sistema vozila, zamena svih delova i tečnosti kočionog sistema vozila Kočionu tečnost bi trebalo na 2 godine kontrolisati i ukoliko se ukaže potreba menjati.
							</p>
						</div>
					</li>
					<li>
						<a href="zamenatrapa.php" class="figure"><img src="slike/delovi_trapa_022.jpg" alt=""></a>
						<div>
							<h3><a href="zamenatrapa.php">Zamena trapa </a></h3>
							<p>
								Trap na vozilu sadrži mnoge komponente (amortizeri, šolje amortizera, krajevi spona, stabilizatori, gumice balans štangle, jabučice, sferni zglobovi, ležajevi) važne za bezbedno upravljanje vozilom. 
							</p>
						</div>
					</li>
					<li>
						<a href="autoklima.php" class="figure"><img src="slike/klima_011.jpg" alt=""></a>
						<div>
							<h3><a href="autoklima.php">Auto klima </a></h3>
							<p>
								Auto klima je sofisticiran sistem koji zahteva redovno servisiranje tj. jednom godišnje ili svake druge godine. Kontrolu, po pravilu, bi trebalo izvršiti pred svaki duži put, u nekom od specijalizovanih servisa.

 
							</p>
						</div>
					</li>
					<li>
						<a href="dijagnostika.php" class="figure"><img src="slike/dijagnostika1.jpg" alt=""></a>
						<div>
							<h3><a href="dijagnostika.php">Dijagnostika </a></h3>
							<p>
								Dijagnostika kao usluga koju pružamo u našem servisniom centru O-G je još jedan dokaz da pratimo razvoj savremenih tehnologija, koje čine da vozila novije generacije sadrže mnogo više od jednog kompjutera.

 
							</p>
						</div>
					</li>
				
				</ul>
	
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